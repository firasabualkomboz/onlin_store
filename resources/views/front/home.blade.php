@extends('layouts.bodyfront')

@section('content')


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>

                    ( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})

                </span></a></li>
            </ul>
            <div class="header__cart__price">عنصر : <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Arabic</a></li>
                    <li><a href="#">English</a></li>

                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu " >
            <ul>
                <li class="active"><a href="./index.html">الرئيسية</a></li>
                <li><a href="./shop-grid.html">تسوق</a></li>
                <li><a href="#">أهم الصفحات</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                {{-- <li><a href="./blog.html">Blog</a></li> --}}
                <li><a href="./contact.html">تواصل معنا </a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>  feras@gmail.com</li>
                <li>تسوق الأن داخل غزة والتوصيل مجاني</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->


    @include('front.include.header-mobile')


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">


                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>جميع الاقسام</span>
                        </div>
                        <ul>
                            @foreach ($maincato as $topcato)
                            <li><a href="#">{{$topcato->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                جميع الأقسام
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder=" ماذا تريد أن تبحث !؟">
                                <button type="submit" class="site-btn">بحث عن منتج </button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+970598082086</h5>
                                <span>دعم فني على  <br> مدار الساعة</span>
                            </div>
                        </div>
                    </div>

                    <div style="direction: rtl"  class="hero__item set-bg" data-setbg="assets/fronts/img/headerimg.jpeg">

                        <div class="hero__text" >
                            <h2 style="color: #fff">زاجل  <br> غزة </h2>
                            <p style="margin-right: 20px">أنت تتسوق الأن داخل غزة</p>
                            <a href="#" class="primary-btn">تسوق الأن</a>
                        </div>


                    </div>
                </div>




            </div>
        </div>

    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @foreach ($maincato as $cato)

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{$cato->photo}}">
                            <h5><a href="#">{{$cato->name}}</a></h5>
                        </div>
                    </div>

                    @endforeach





                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

        <!-- Blog Section Begin //عن الموقع  -->


        <section class="from-blog spad" >

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>عن المتجر </h2>
                        </div>
                    </div>
                </div>


                <div class="row" >

                    <div  class="col-lg-4 col-md-4 col-sm-6" >

                        <div class="blog__item">
                            <div class="blog__item__pic">
                                {{-- <img src="assets/fronts/img/blog/blog-1.jpg" alt=""> --}}
                            </div>
                            <div style="text-align: center" class="blog__item__text">
                                {{-- <ul>
                                    <li><i class="fa fa-twitter"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul> --}}
                                <h5><a  style="text-align: right" href="#">شحن آمن وسريع</a></h5>
                                <p>توصيل داخل غزة بإسعار رمزية  </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                {{-- <img src="assets/fronts/img/blog/blog-2.jpg" alt=""> --}}
                            </div>
                            <div style="text-align: center" class="blog__item__text">
                                {{-- <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul> --}}
                                <h5 ><a href="#">أسئلة شائعة</a></h5>
                                <p>إذا كان لديك أي سؤال عن طرق التوصيل أو الشحن يمكنك الحصول على إجابات هنا</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                {{-- <img src="assets/fronts/img/blog/blog-3.jpg" alt=""> --}}
                            </div>
                            <div style="text-align: center" class="blog__item__text">
                                {{-- <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul> --}}



                                <h5><a href="#">عندك بضاعة للبيع ؟</a></h5>
                                <p>إذا لديك منتجات أو بضاعة وحابب تسوقها يمكنك التواصل معنا </p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- Blog Section End -->

    <!-- Featured Section Begin -->

    @if( session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif





    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>أحدث منتجاتنا </h2>
                    </div>
                    <div class="featured__controls">
                        <ul>




                            <li class="active" data-filter="*"> الكل </li>
                            {{-- @foreach ($maincato as $maincategory)
                            <li data-filter=".oranges">{{$maincategory->name}}</li>
                            @endforeach --}}

                            <li data-filter=".fashone" class="">فاشون</li>
                            <li data-filter=".electoronic" class="">الكترونيات</li>
                            <li data-filter=".mobile" class="">موبايل</li>
                            <li data-filter=".vegetables" class="">العاب وهدايا</li>
                            <li data-filter=".sala" class=""> السلة</li>
                            <li data-filter=".fastfood" class="active mixitup-control-active">صحة وجمال  </li>


                        </ul>
                    </div>
                </div>
            </div>


<div class="row featured__filter">






@foreach ($fastionproduct as $fashonepro)
    <div class="col-lg-3 col-md-4 col-sm-6 mix fashone ">
    <div class="featured__item">
    <div class="featured__item__pic set-bg" data-setbg="{{$fashonepro->photoone}}">
        <ul class="featured__item__pic__hover">
            <li><a href="#"><i class="fa fa-heart"></i></a></li>

        <li><a href="{{route('front.details_product',[ 'id' => $fashonepro->id])}}"><i class="fa fa-eye"></i></a></li>
            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
                        </div>
                        <div class="featured__item__text">
                        <h6><a href="#">{{$fashonepro->name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>


                @endforeach




@foreach ($elcetonic as $elcetonicpro)
<div class="col-lg-3 col-md-4 col-sm-6 mix electoronic ">
<div class="featured__item">
<div class="featured__item__pic set-bg" data-setbg="{{$elcetonicpro->photoone}}">
    <ul class="featured__item__pic__hover">
        <li><a href="#"><i class="fa fa-heart"></i></a></li>
        <li><a href="{{route('front.details_product',[ 'id' => $elcetonicpro->id])}}"><i class="fa fa-eye"></i></a></li>
    <li><a href="{{ route('cart.add',$elcetonicpro)}}"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>
                    </div>
                    <div class="featured__item__text">
                    <h6><a href="#">{{$elcetonicpro->name}}</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>


            @endforeach




@foreach ($mobile as $mobilepro)
<div class="col-lg-3 col-md-4 col-sm-6 mix mobile ">
<div class="featured__item">
<div class="featured__item__pic set-bg" data-setbg="{{$mobilepro->photoone}}">
    <ul class="featured__item__pic__hover">
        <li><a href="#"><i class="fa fa-heart"></i></a></li>
        <li><a href="{{route('front.details_product',[ 'id' => $mobilepro->id])}}"><i class="fa fa-eye"></i></a></li>
        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>
                    </div>
                    <div class="featured__item__text">
                    <h6><a href="#">{{$mobilepro->name}}</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>


            @endforeach


            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix sala ">
            <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{$product->photoone}}">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="{{route('front.details_product',[ 'id' => $product->id])}}"><i class="fa fa-eye"></i></a></li>
                    <li><a href="{{ route('cart.add',$product)}}"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
                                </div>
                                <div class="featured__item__text">
                                <h6><a href="#">{{$product->name}}</a></h6>
                                    <h5>{{$product->price}}</h5>
                                </div>
                            </div>
                        </div>


                        @endforeach




            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="section-title">
                <h2>الإعلانات  </h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/fronts/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/fronts/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>جديد </h4>
                        <div class="latest-product__slider owl-carousel">


     <div class="latest-prdouct__slider__item">

        @foreach ($lastproduct as $itemmlast)



                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$itemmlast->photoone}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$itemmlast->name}}</h6>
                                            <span> $ {{$itemmlast->price}} </span>
                                        </div>
                                    </a>


         @endforeach



                            </div>
                            <div class="latest-prdouct__slider__item">
@foreach ($lastproduct2 as $itemlast)


                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{$itemlast->photoone}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$itemlast->name}}</h6>
                                        <span>{{$itemlast->price}}</span>
                                    </div>
                                </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>الأكثر مببيعاً</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                @foreach ($buy as $itembuy)


                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{$itembuy->photoone}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$itembuy->name}}</h6>
                                        <span>{{$itembuy->price}}</span>
                                    </div>
                                </a>

                                @endforeach




                            </div>
                            <div class="latest-prdouct__slider__item">

                                @foreach ($buy2 as $itembuy2)


                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{$itembuy2->photoone}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$itembuy2->name}}</h6>
                                        <span>{{$itembuy2->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>تنزيلات </h4>

                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                @foreach ($cuts as $item)
                                <a href="#" class="latest-product__item">
                                    <div  class="latest-product__item__pic">
                                        <img  src="{{$item->photoone}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item->name}}</h6>
                                        <span>{{$item->price}}</span>
                                    </div>
                                </a>
                                @endforeach





                            </div>
                            <div class="latest-prdouct__slider__item">


                                @foreach ($cuts2 as $item2)

                                @endforeach
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{$item2->photoone}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item2->name}}</h6>
                                        <span>{{$item2->price}}</span>
                                    </div>
                                </a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->


</body>

</html>

@endsection
