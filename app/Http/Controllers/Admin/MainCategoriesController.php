<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;
use DB;

use Illuminate\Support\Str;

class MainCategoriesController extends Controller
{
    // return Config::get('app.locale');


    public function index()
    {
        $default_lang = Config::get('app.locale');
        // $default_lang = get_default_lang();
        $categories = MainCategory::selection()->get();
        return view('admin.maincategories.index', compact('categories', 'default_lang'));

        //   $default_lang = get_default_lang();

        //     $categories = MainCategory::Where('translation_lang',$default_lang)->selection()->get();
        //     return view ('admin.maincategories.index',compact('categories'));

    } //end index

    public function create()
    {

        return view('admin.maincategories.create');
    }

// public function store(MainCategoryRequest $request){
//     // return view ('admin.maincategories.store');

//       //return $request;

//       $main_categories = collect($request->category);

//       $filter = $main_categories->filter(function ($value, $key) {
//           return $value['abbr'] == get_default_lang();
//       });

//       $default_category = array_values($filter->all()) [0];


//       $filePath = "";
//       if ($request->has('photo')) {

//           $filePath = uploadImage('maincategories', $request->photo);
//       }


//       return $default_category_id = MainCategory::insertGetId([
//         'translation_lang' => $default_category['abbr'],
//         'translation_of' => 0,
//         'name' => $default_category['name'],
//         'slug' => $default_category['name'],
//         'photo' => $filePath
//     ]);

// }


    public function store(MainCategoryRequest $request)

    {

        // define function get a default language :
        function get_default_lang()
        {
            return Config::get('app.locale');
        }

        function uploadImage($folder, $image)
        {
            $image->store('/', $folder);
            $filename = $image->hashName();
            $path = 'images/' . $folder . '/' . $filename;
            return $path;
        }


        try {
            //return $request;
            $main_categories = collect($request->category);

            $filter = $main_categories->filter(function ($value, $key) {

                return $value['abbr'] == get_default_lang();

            });

            $default_category = array_values($filter->all()) [0];


            $filePath = "";
            if ($request->has('photo')) {
                $filePath = uploadImage('maincategories', $request->photo);
            }

            DB::beginTransaction();

            $default_category_id = MainCategory::insertGetId([

                'translation_lang' => $default_category['abbr'],
                'translation_of' => 0,
                'name' => $default_category['name'],
                'slug' => $default_category['name'],
                'photo' => $filePath

            ]);

            $categories = $main_categories->filter(function ($value, $key) {

                return $value['abbr'] != get_default_lang();

            });


            if (isset($categories) && $categories->count()) {

                $categories_arr = [];
                foreach ($categories as $category) {
                    $categories_arr[] = [
                        'translation_lang' => $category['abbr'],
                        'translation_of' => $default_category_id,
                        'name' => $category['name'],
                        'slug' => $category['name'],
                        'photo' => $filePath
                    ];
                }

                MainCategory::insert($categories_arr);
            }

            DB::commit();

            return redirect()->route('admin.maincategories')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function edit($mainCat_id)

    {

        //get specific categories and its translations
        $mainCategory = MainCategory::with('categories')
            ->selection()
            ->find($mainCat_id);

        if (!$mainCategory)
            return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.maincategories.edit', compact('mainCategory'));

    }


// public function edit($mainCat_id){

//     //return cato with trans
//     $maincategory = MainCategory::with('categories')->selection()->find($mainCat_id);
//     if(!$maincategory){
//         return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود']);

//     }
//     return view ('admin.maincategories.edit',compact('maincategory')); //maincategory الي رح ادوس عليها
// }
//لو موجود هنعمل ابديت ع الداتا  والتابل هو المودل تي نعمل ابديت ع الحدول


    public function update($mainCat_id, MainCategoryRequest $request)
    {


        try {
            $main_category = MainCategory::find($mainCat_id);

            if (!$main_category)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

// update date

            $category = array_values($request->category) [0];

            if (!$request->has('category.0.active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);


            MainCategory::where('id', $mainCat_id)
                ->update([
                    'name' => $category['name'],
                    'active' => $request->active,
                ]);

// save image

            if ($request->has('photo')) {
                $filePath = uploadImage('maincategories', $request->photo);
                MainCategory::where('id', $mainCat_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }


            return redirect()->route('admin.maincategories')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function destroy($id)
    {

        try {
            $maincategory = MainCategory::find($id);
            if (!$maincategory)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

            $vendors = $maincategory->vendors();
            if (isset($vendors) && $vendors->count() > 0) {
                return redirect()->route('admin.maincategories')->with(['error' => 'لأ يمكن حذف هذا القسم  ']);
            }

            $image = Str::after($maincategory->photo, 'assets/');
            $image = base_path('assets/' . $image);
            unlink($image); //delete from folder
//defult translation
            $maincategory->categories()->delete();
            $maincategory->delete();
            return redirect()->route('admin.maincategories')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function changeStatus($id)
    {
        try {
            $maincategory = MainCategory::find($id);
            if (!$maincategory)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

            $status = $maincategory->active == 0 ? 1 : 0;

            $maincategory->update(['active' => $status]);
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);


        } catch (\Exception $ex) {
            return redirect()->route('admin.maincategories')->with(['success' => ' تم تغيير الحالة بنجاح ']);
        }
    }


}


