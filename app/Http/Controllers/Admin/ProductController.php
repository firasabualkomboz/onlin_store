<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use App\Models\MainCategory;
use App\Models\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


// use Stripe;
class ProductController extends Controller

{
    public function index()
    {

        return view('admin.product.index')->with('product', Product::all());

    } //end fun index


    public function create()
    {

        $maincategory = MainCategory::where('translation_of', 0)->active()->get();

        return view('admin.product.create', compact('maincategory'))->with('subsection', Section::all());

    }


    public function store(Request $request)
    {


        $this->validate($request, [

            'name' => 'required',
            'price' => 'required',
            'main_category_id' => 'required',
            'photoone' => 'required|image'

        ]);


        $photoone = $request->photoone;
        $photoone_new_name = time() . $photoone->getClientOriginalName();
        $photoone->move('uploads/image/product/', $photoone_new_name);


        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'main_category_id' => $request->main_category_id,
            'photoone' => 'uploads/image/product/' . $photoone_new_name,
        ]);

        return redirect()->back();
    }


    public function addToCart(Product $product)
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        // dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'The Product has been added to the cart'); //true

    }//end add to cart product


    public function showCart()
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('cart.show', compact('cart'));
    }

    public function checkout($amount)
    {

        return view('cart.checkout', compact('amount'));
        // return $amount;
    }

    public function charge(Request $request)
    {

        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount' => $request->amount,
            'description' => ' Test from laravel new app'
        ]);

        $chargeId = $charge['id'];

        if ($chargeId) {
            // save order in orders table ...
            auth()->user()->orders()->create([
                'cart' => serialize(session()->get('cart'))
            ]);

            // clearn cart
            session()->forget('cart');
            return redirect()->route('shop')->with('success', " Payment was done. Thanks");
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {

            $product = Product::find($id);

            if (!$product)

                return redirect()->route('admin.product')->with(['error' => 'هذا القسم غير موجود ']);


            $product->delete();
            return redirect()->route('admin.product')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.product')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


}
