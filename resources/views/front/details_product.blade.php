@extends('layouts.bodyfront')

@section('content')


    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div>  --}}



    <!-- Breadcrumb Section Begin -->
    <section  class="breadcrumb-section set-bg" data-setbg="{{$product->photoone}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->name}}</h2>
                        <div  class="breadcrumb__option">
                            <a href="/home">الرئيسية</a>
                            <a href="">القسم</a>
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
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="assets/fronts/img/product/details/product-details-2.jpg"
                                src="assets/fronts/img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="assets/fronts/img/product/details/product-details-3.jpg"
                                src="assets/fronts/img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="assets/fronts/img/product/details/product-details-5.jpg"
                                src="assets/fronts/img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="assets/fronts/img/product/details/product-details-4.jpg"
                                src="assets/fronts/img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div dir="rtl" style="text-align: right" class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>( 18 زيارة)</span>
                        </div>
                        <div class="product__details__price">$50.00</div>
                        <p>تفاصيل اكثر عن المنتج
                            <br>
                            تفاصيل
                            <br>
                            تفاصيل
                            <br>
                            تفاصيل
                            <br>
                            تفاصيل

                            .</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="count" type="text" value="1">
                                </div>
                            </div>
                        </div>
                    <a href="" class="primary-btn"> أريد طلب هذا المنتج  </a>

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>

                        <ul>
                            <li><b>الحالة</b> <span>متوفر</span></li>
                            <li><b>الشحن</b> <span>بعد ساعة من ارسال الطلب  <samp>2</samp></span></li>
                            <li><b>تفاصيل اخرى </b> <span>--</span></li>

                        </ul>

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





</body>

</html>

@endsection
