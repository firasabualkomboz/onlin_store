<div class="container">
    <div class="row" >


        <div class="col-lg-3">
            <div class="header__logo">
                <a href="./index.html"><img src="img/logo.png" alt=""></a>
            </div>
        </div>


        <div class="col-lg-6">
            <nav class="header__menu" style="direction: rtl" >

                <ul style="text-align: right">
                    <li class="active">
                    <a style="" href="./index.html">الرئيسية</a></li>
                    <li><a   href="./shop-grid.html">تسوق</a></li>
                    <li><a href="./contact.html">تواصل معنا </a></li>
                    <li ><a  href="#"> أهم الصفحات</a>

                        {{-- <ul class="header__menu__dropdown">
                            <li><a href="./shop-details.html">Shop Details</a></li>
                            <li><a href="./shoping-cart.html">المفضلة </a></li>
                            <li><a href="./checkout.html">Check Out</a></li>
                            <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul> --}}

                    </li>


                </ul>


            </nav>
        </div>
        <div class="col-lg-3">
            <div class="header__cart">
                <ul>
                    <li><a href="#"> <i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-bag"></i> <span>
                        ( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})
                    </span>  </a></li>



                </ul>
                <div class="header__cart__price">   ( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}) <span>

                </span></div>




            </div>
        </div>



    </div>
    <div class="humberger__open">
        <i class="fa fa-bars"></i>
    </div>
</div>
