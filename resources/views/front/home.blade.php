@extends('layouts.bodyfront')

@section('content')


    <!-- Page Preloder -->
    {{-- @include('front.include.loder') --}}
    @include('front.include.header-top')

    <!-- Hero Section Begin -->

    <section  class="hero">
        <div class="container">
            <div class="row">


                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>جميع الاقسام</span>
                        </div>
                        <?php
                        $upto = ['helth','fashone'];
                        ?>
                        <ul>
                            @foreach ($maincato as $topcato)
                            <li><a  href="#">{{$topcato->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div style="direction: rtl"  class="hero__item set-bg" data-setbg="assets/fronts/img/headerimg.jpeg">

                        <div class="hero__text" >
                            <h2 style="color: #fff">زاجل  <br> غزة </h2>
                            <p style="margin-right: 20px">أنت تتسوق الأن داخل غزة</p>
                            <a href="/shop " class="primary-btn">تسوق الأن</a>
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
                            <h5><a >{{$cato->name}}</a></h5>
                        </div>
                    </div>

                    @endforeach





                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

        <!-- Blog Section Begin //عن الموقع  -->


        <section class="from-blog spad text-center" >

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>عن المتجر </h2>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div  class="col-lg-4 col-md-4 col-sm-6" >

                        <div class="blog__item">

                            <div class="blog__item__text">

                                <h5><a  style="text-align: right" href="#">شحن آمن وسريع</a></h5>
                                <p>توصيل داخل غزة بإسعار رمزية  </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">

                            <div class="blog__item__text">

                                <h5 ><a href="#">أسئلة شائعة</a></h5>
                                <p>إذا كان لديك أي سؤال عن طرق التوصيل أو الشحن يمكنك الحصول على إجابات هنا</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__text">
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
    {{-- section product by category  --}}



    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>أحدث المنتجات</h2>
                    </div>
                    <div class="featured__controls">

<?php
$types = ['all','fashone', 'electoronic','vegetables','sala','fastfood'];
?>

<ul>

@foreach ($types as $index=> $type)
<li class="{{$index ==0 ? 'active' : ''}}">
<a href="#{{$type}}" data-filter=".{{$type}}">@lang('auth.'.$type)</a></li>
@endforeach


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


            </div>
            <a class="primary-btn all-product" href="/shop">جميع المنتجات </a>
        </div>
    </section>







</body>

</html>
