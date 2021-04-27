@extends('layouts.bodyfront')

@section('content')

@include('front.include.header-top')



<section class="shop-top">
<div class="container">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/home">@lang('auth.home')</a></li>
<li class="breadcrumb-item"><a>@lang('auth.favorite')</a></li>
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

{{-- start section all favorite product  --}}

<div class="favorite-product">

    <div class="container">
        <div class="row">

@if($products->isEmpty())
<h4>لا يوجد عناصر في المفضلة !! </h4>
@else
@foreach ($products as $product)

            <div class="col-lg-4">
                <div class="body-favorite">
                    <img style="max-width: 100%" src="{{$product->photoone}}" alt="">
                    <h4>{{$product->name}}</h4>
                    <h5>${{$product->price}}</h5>
                    <a href="">Drop</a>
                </div>
            </div>
@endforeach
@endif

        </div>

    </div>

</div>

{{-- end section all favorite product  --}}

    <section class="shop-product">
        <div class="container">

            <div class="row">
{{--                <div class="col-lg-3">--}}
{{--                    <h2>الأقسام</h2>--}}
{{--                    <div class="list-product">--}}
{{--                        <ol class="list-unstyled">--}}

{{--                            @foreach ($categories as $category)--}}
{{--                                <li class="category_li"><a class="category_a" target="_blank" href="{{route('front.category_shop',[ 'category' => $category->id])}}">{{$category->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-9">
                    <h2>@lang('auth.favorite')</h2>
                    <br>
                    @if($products->isEmpty())

                       <h4>لا يوجد عناصر في المفضلة !! </h4>

                    @else
                        <div class="row">


                            <table style="direction: rtl; text-align: right;" class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اسم المنتج</th>
                                    <th scope="col">الصورة</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">اكشن</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($products as $product)

                                    <div class="col-lg-4">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$product->name}}</td>
                                            <td><img style="width: 25%" src="{{$product->photoone}}" alt=""></td>
                                            <td>{{$product->price}}</td>
                                            <td><button class="btn btn-danger">حذف</button></td>
                                        </tr>

                                    </div>




                                @endforeach




                                </tbody>
                            </table>


                        </div>

                    @endif



                </div>

            </div>




        </div>



    </section>

@endsection
