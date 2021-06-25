<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserProductFavorite;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function who_are_we(){
        return view('front.who_are_we');
    }


    public function index(Request $request)
    {
        $text_category = MainCategory::all();

        $products = Product::all();

        $maincato = MainCategory::where('translation_of',0)->active()->get();
        $fastionproduct = Product::where('main_category_id',16)->get();
        $elcetonic = Product::where('main_category_id',10)->get();


        $gift = Product::where('main_category_id',5)->get();
        $hb = Product::where('main_category_id',3)->get();
        $mobile = Product::where('main_category_id',7)->get();

        $cuts = Product::where('price','<',50)->take(3)->get();
        $cuts2 = Product::where('price','<',100)->take(3)->get();
        $buy = Product::where('price','>',50)->take(3)->get();
        $buy2 = Product::where('price','>',50)->take(3)->get();

        $products = Product::when($request->search, function ($q) use ($request) {
            return $q->whereTranslationLike('name', '%' . $request->search . '%');
        })->latest()->paginate(5);


        return view('front.home',compact('maincato','products','fastionproduct','elcetonic','mobile','cuts','cuts2'
        ,'buy','buy2' , 'gift' ,'hb','products' ,'text_category',
        ))
        ->with('topcato' , MainCategory::take(20)->get())
        ->with('lastproduct' , Product::orderBy('created_at','desc')->take(3)->get())
        ->with('lastproduct2' , Product::orderBy('created_at','desc')->skip(3)->take(3)->get())
        ;
    }

    public function Productdetails($id){

        // $product = Product::with('categories')->findOrFail(1);

        // $categoryIds = $product->categories->pluck('id')->toArray();

        // $similarProducts = Product::has('categories', function ($query) use ($categoryIds) {
        //     return $query->whereIn('id', $categoryIds);
        // })->whereNot('id', $product->id)
        //     ->limit(10)
        //     ->get();


        $product = Product::find($id);
        // $productref = Product::where('main_category_id',7)->get(4);
        return view('front.details_product', ['product' => $product])
        ->with('productref',Product::where('main_category_id',7)->take(4)->get())
        ->with('maincato',MainCategory::where('translation_of',0)->active()->get())
        // ->with('fastionproduct',Product::where('main_category_id',16)->get())
        ;
    }

    function shop_by_category(Request $request , $id){

     $categories = MainCategory::with('products')->findOrFail($id);

     return view('front.category_shop',compact('categories'))
     ->with('all_category',MainCategory::where('translation_of',0)->active()->get())
     ;

    }


    public function authroute(){
        return "page not found ";
    }


 public function logout()
 {
    Auth::logout();
    return redirect()->route('home')->with(['success'=>' تمت عملية تسجيل الخروج ']);
 } // end log out


 public function shop_product(Request $request){

        if(session('success')){
            toast(session('success'),'success');
        }

     $categories = MainCategory::where('translation_of',0)->active()->get();
     $products = Product::all();
     $mightAlsoLike = Product::where('price', '!=', '80')->get();

    return view('front.shop',compact('products'))->with(
        [
            'categories'=> $categories,
            'mightAlsoLike' => $mightAlsoLike,
        ]
    );
 }


 public function same_product(){

    $product = Product::with('categories')->findOrFail(1);

    $categoryIds = $product->categories->pluck('id')->toArray();

    $similarProducts = Product::has('categories', function ($query) use ($categoryIds) {
        return $query->whereIn('id', $categoryIds);
        })->whereNot('id', $product->id)
        ->limit(10)
        ->get();

 }


}
