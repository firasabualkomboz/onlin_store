<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\LanguageRequest;

class languagesController extends Controller
{

public function index(){

$languages = Language::select()->paginate(PAGINATION_COUNT);
return view('admin.languages.index', compact('languages'));

} //end index


public function create(){

return view ('admin.languages.create');

} //end create


   public function store(LanguageRequest $request ){

    // بعد الفحص نحفطه في الداتا بيز

// return $request->except(['_token']); // هذا برجع json

try{
Language::create($request->except(['_token']));
return redirect()->route('admin.languages')->with(['success'=>'تم إضافة اللغة بنجاح']);
}catch(\Exception $ex){
return redirect()->route('admin.languages')->with(['error'=>'يوجد خطأ في إضافة اللغة ']);
}


}


public function edit($id){

    $language = Language::select()->find($id);
    if(!$language){
        return redirect()->route('admin.dashboard')->with(['error'=>'اللغة مش موجودة']);
    }
    return view ('admin.languages.edit',compact('language'));

}


public function update($id,LanguageRequest $request){

    try{
    $language = Language::find($id);
    if(!$language){
        return redirect()->route('admin.languages.edit',$id)->with(['error'=>'اللغة مش موجودة']);
    }
    if(!$request->has('active'))
    $request ->request->add(['active'=>0]);
    // اذا لو موجودة اعمل ابديت في الداتا بيز
    $language->update($request->except('_token'));
    return redirect()->route('admin.languages')->with(['seccess'=>'تم التحديث بنجاح']);
    }catch
    (\Exception $ex){
        return redirect()->route('admin.languages')->with(['error'=>'باشا هناك خطأ ما بليزز حاول مرة تانية ']);
    }
}




public function destroy($id)
{
    try{
        $language = Language::find($id);
        if(!$language){
            return redirect()->route('admin.languages',$id)->with(['error'=>'اللغة مش موجودة']);
        }

        $language->delete();
        return redirect()->route('admin.languages')->with(['seccess'=>'تم الحذف بنجاح']);
        }catch
        (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error'=>'باشا هناك خطأ ما بليزز حاول مرة تانية ']);
        }
}

}


