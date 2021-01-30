@extends('layouts.bodyfront')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section  class="breadcrumb-section set-bg" data-setbg="{{$product->photoone}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->name}}</h2>
                        <div  class="breadcrumb__option">
                            <a href="/home">الرئيسية</a>
                            <a href="/shop">تسوق</a>
                            <a href="">{{$product->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section dir="rtl" class="product-details spad">
        <div class="container">
            <div dir="rtl" class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{$product->photoone}}" alt="mm">
                        </div>

                    </div>
                </div>
                <div dir="rtl" style="text-align: right" class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__price">${{$product->price}}</div>
                        <p>تفاصيل اكثر عن المنتج</p>

                    <a class="primary-btn" href="{{ route('cart.add',$product)}}">أضافة الى السلة</a>

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section dir="rtl" class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>منتجات ذات صلة </h2>
                    </div>
                </div>
            </div>
            <div class="row">

{{-- @foreach ($productref as $productrefe)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$productrefe->photoone}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$productrefe->name}}</a></h6>
                            <h5>{{$productrefe->price}}</h5>
                        </div>
                    </div>
                </div>
@endforeach --}}


            </div>
        </div>
    </section>
    <!-- Related Product Section End -->


@endsection
