@extends('layouts.bodyfront')

@section('content')
@include('front.include.loder')
@include('front.include.header-top')


<section class="shop-top">
<div class="container">
{{--    <nav aria-label="breadcrumb">--}}
{{--        <ol class="breadcrumb">--}}
{{--          <li class="breadcrumb-item"><a href="/home">@lang('auth.home')</a></li>--}}
{{--          <li class="breadcrumb-item"><a> @lang('auth.shop')</a></li>--}}
{{--        </ol>--}}
{{--      </nav>--}}

    <!-- Breadcrumb Section Begin -->
    <section  class="breadcrumb-section set-bg" data-setbg="assets/fronts/img/banner/pexels-photo.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>@lang('auth.shop')</h2>
                        <div  class="breadcrumb__option">
                            <a href="/home">الرئيسية</a>
                            <a class="active" href="/shop">تسوق</a>
                            <a style="color: #7FAD39">@lang('auth.last-product')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



</div>  {{-- end container --}}
</section>  {{-- end section --}}



{{--start section product --}}

    <section class="shop-product">
        <div class="container">

            <h2>@lang('auth.last-product')</h2>

<div class="category-list">
    <ol class="list-unstyled">
        @foreach($categories as $category)
            <li class="category_li"><a class="category_a" href="{{route('front.category_shop',[ 'category' => $category->id])}}">{{$category->name }}</a></li>
        @endforeach

    </ol>


    {{-- search form --}}
    <div style="margin-top: 1%" class="hero__search">
        <div class="hero__search__form">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <input type="text"  name="q" placeholder="@lang('auth.search')">
                <button type="submit" class="site-btn">@lang('auth.search_btn')</button>
            </form>
        </div>
    </div>
    {{-- end search form --}}







</div>

            <div class="row">



                @foreach ($products as $item_product)
                @if($products != null)
                    <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                    <div class="col-md-4">
                    <a href="{{route('front.details_product',['id' => $item_product->id])}}"><img src="{{$item_product['photoone']}}" alt=""></a>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">منتج تجريبي</h5>
                    <p class="card-text">{{$item_product['price']}} $ </p>
                    <a href="">Add to fovrite</a>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    @else
                    <div class="col-lg-4">
                        <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                        <a href="{{route('front.details_product',['id' => $item_product->id])}}"><img src="{{$item_product['photoone']}}" alt=""></a>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">منتج تجريبي</h5>
                        <p class="card-text">{{$item_product['price']}} $ </p>
                        <a href="">Add to fovrite</a>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>

                @endif
                @endforeach





            </div>


            <div class="row">


                @foreach($products as $product)

                    <div class="col-lg-3">

                        <div class="card-shop-product">
                            <img style="width: 100%" src="{{$product->photoone}}" alt="">

                            <div class="data-product">
                                <ol class="list-unstyled">
                                    <li><a href="{{ route('front.details_product',[ 'id' => $product->id])}}">{{$product->name}} </a></li>
                                    <li>{{$product['price']}}</li>
                                </ol>
                                <?php
                                $favoritelist=\Illuminate\Support\Facades\DB::table('favorite')->rightJoin('product','favorite.product_id','=','product.id')
                                    ->where('favorite.product_id','=',$product->id)->get();
                                $count=\App\Models\UserProductFavorite::where(['product_id'=>$product->id])->count();
                                ?>

                                @if($count=="0")
                                    <form action="{{route('addfavorite')}}" method="post" role="form">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <button class="btn-add-fav" type="submit"> <a class="add-to-fav" href=""> <i class="fa fa-heart"></i></a></button>
                                    </form>
                                @else

                                    <a style="color: #7FAD39" class="add-to-fav" href=""> <i class="fa fa-heart"></i></a>

                                @endif


                            </div>

                        </div>

                    </div>


                @endforeach

            </div>

        </div>
    </section>

    <!-- end shop product  -->






@endsection
