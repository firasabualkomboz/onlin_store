@extends('layouts.bodyfront')

@section('content')

    @include('front.include.loder')
    @include('front.include.header-top')
    <section class="shop-top">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">@lang('auth.home')</a></li>
                    <li class="breadcrumb-item"><a> @lang('auth.carts')</a></li>
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

  @foreach($carts as $cart)

      <section class="order-tbl">
          <div class="container">
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">اسم المنتج</th>
                      <th scope="col">االصورة</th>
                      <th scope="col">السعر</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($cart->items as $item)
                      <tr>
                          <th scope="row">0</th>
                          <td> {{$item['name']}}</td>
                          <td><img style="width: 15%" src="{{$item['photoone']}}" alt=""></td>
                          <td>{{$item['price']}}</td>
                      </tr>

                  @endforeach
                  </tbody>
              </table>
          </div>
      </section>

  @endforeach
@endsection
