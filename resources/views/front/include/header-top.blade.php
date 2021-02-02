 {{-- section nav bar  --}}
    <section class="header-v1">
        <div class="container">
           <div class="row">
               <div class="col-lg-3">
                <div class="item-v1">
            <ol>
                <li><h1>زاجل</h1></li>
            </ol>
                </div>
               </div>

               <div class="col-lg-6">
                <div class="item-2-v1">
               <ol>
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('shop')}}">تسوق الأن</a></li>
                <li> من نحن </li>
                <li><a href="/sendemail"> @lang('auth.contact')</a></li>
               </ol>
                </div>
             </div>

             <div class="col-lg-3">
                <div class="item-3-v1">
               <ol>
                <li><a><i class="fa fa-heart"></i><span>1</span></a></li>

                <li><a class="cart" href="{{route('cart.show')}}">
                <i class="fa fa-shopping-bag"></i>
                <span>( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})</span>
                </a></li>

                @if(Auth::check())
                <li>
                <a>
                <span class="fa fa-user"></span> أهلاً بك  </a>
                {{ auth()->user()->name }}
               <a class="btn-logout"  href="/logout"><i class="fa fa-sign-out"></i></a>
                </li>

                @else
                <li><button class="btn-login"><a target="_blank" href="/login"><span class="fa fa-user"> تسجيل دخول  </span></a></button></li>
                @endif


               </ol>
                </div>
             </div>


           </div>
        </div>
    </section>


    {{-- end section navbar --}}
