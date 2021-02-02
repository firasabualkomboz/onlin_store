@extends('layouts.bodyfront')

@section('content')

@include('front.include.header-top')


    <section class="shop-top">
        <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/home">الرئيسية</a></li>
                          <li class="breadcrumb-item"><a href="/shop"> تسوق</a></li>
                          <li class="breadcrumb-item"><a> السلة</a></li>
                        </ol>
                      </nav>
        </div>
        </section>


@if( session()->has('success'))
 <div class="container">
     <div class="alert alert-success">{{ session()->get('success') }}</div>
 </div>
@endif


    <div class="container">
        <div style="margin-top: 100px" class="row">
            @if($cart)
            <div class="col-md-8">
                    @foreach( $cart->items as $product)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $product['name'] }}
                                    </h5>
                                    <div class="card-text">
                                        ${{ $product['price'] }}
                                        <a href="#" class="btn btn-danger btn-sm ml-4">Remove</a>
                                        <input type="text" name="qty" id="qty" value={{ $product['qty']}}>
                                        <a href="#" class="btn btn-secondary btn-sm">Change</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <p><strong>Total : ${{$cart->totalPrice}}</strong></p>

            </div>

            <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-titel">
                        Your Cart
                        <hr>
                    </h3>
                    <div class="card-text">
                        <p>
                        Total Amount is ${{$cart->totalPrice}}
                        </p>
                        <p>
                        Total Quantities is {{$cart->totalQty}}
                        </p>
                    <a href="{{ route('cart.checkout', $cart->totalPrice)}}" class="btn btn-info">Checkout</a>
                    </div>
                </div>
            </div>
            </div>
            @else
            <p>There are no items in the cart</p>

            @endif
        </div>
    </div>




</body>

</html>

@endsection
