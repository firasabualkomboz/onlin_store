@extends('layouts.bodyfront')

@section('content')
@include('front.include.header-top')

<section class="shop-top">
<div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/home">@lang('auth.home')</a></li>
                  <li class="breadcrumb-item"><a href="/shop"> @lang('auth.shop')</a></li>
                     @if(isset($details))
                    <li class="breadcrumb-item"><a> <b> {{ $query }} </b></a></li>
                </ol>
              </nav>
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
        <h2>أحدث المنتجات</h2>

        <div class="row">
                    @foreach($details as $product)
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

    @endif

    @if(count($errors))
    <div class="alert alert-danger" role="alert">{{session('msg')}}</div>
    @endif


</div>




</section>

@endsection
