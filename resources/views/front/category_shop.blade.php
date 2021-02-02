@extends('layouts.bodyfront')

@section('content')
    @include('front.include.header-top')

    <section class="shop-top">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">@lang('auth.home')</a></li>
                    <li class="breadcrumb-item"><a href="/shop"> @lang('auth.shop')</a></li>
                    <li class="breadcrumb-item"><a>{{$category->name}}</a></li>
                </ol>
            </nav>

            <div class="hero__search">
                <div class="hero__search__form">
                    <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <input type="text"  name="q" placeholder="@lang('auth.search')">
                        <button type="submit" class="site-btn">@lang('auth.search_btn')</button>

                    </form>
                </div>
            </div>

        </div>



    </section>



    <section class="shop-product">
        <div class="container">


            <div class="row">
                <div class="col-lg-3">
                    <h2>الأقسام</h2>
                    <div class="list-product">
                        <ol class="list-unstyled">

                            @foreach ($categories as $category)
                                <li>{{$category->name}}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h2>{{$category->name}}</h2>

                    <div class="row">
                      @foreach ($product as $product)
                            <div class="col-lg-4">

                                <div class="product">
                                    <img style="width: 50%" src="{{$product->photoone}}" alt="">
                                    <h3><a href="{{ route('front.details_product',[ 'id' => $product->id])}}">{{$product->name}}</a></h3>
                                    <span>{{$product->price}}</span>
                                </div>

                            </div>
                      @endforeach
                    </div>


                </div>

            </div>

        </div>

    </section>

@endsection
