<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
<div class="main-menu-content">
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

<li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
</li>

<li class="nav-item open "><a href=""><i class="la la-home"></i>
<span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
<span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\language::count()}}</span>
</a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.languages')}}"
data-i18n="nav.dash.ecommerce"> عرض الكل </a>
</li>
<li><a class="menu-item" href="{{route('admin.languages.create')}}" data-i18n="nav.dash.crypto">أضافة لغة جديدة  </a>
</li>
</ul>
</li>


<li class="nav-item"><a href=""><i class="la la-group"></i>
<span class="menu-title" data-i18n="nav.dash.main">الأقسام الرئيسية</span>
<span
class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\MainCategory::defaultCategory()->count()}}</span>
</a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.maincategories')}}"
data-i18n="nav.dash.ecommerce"> عرض الكل </a>
</li>
<li><a class="menu-item" href="{{route('admin.maincategories.create')}}" data-i18n="nav.dash.crypto">أضافة
قسم جديد </a>
</li>
</ul>
</li>


<li class="nav-item"><a href=""><i class="la la-group"></i>
<span class="menu-title" data-i18n="nav.dash.main">الأقسام الفرعية </span>
<span
class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\section::count()}}</span>
</a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.subcategories')}}"
data-i18n="nav.dash.ecommerce"> عرض الكل </a>
</li>
<li><a class="menu-item" href="{{route('admin.subcategories.create')}}" data-i18n="nav.dash.crypto">أضافة
قسم فرعي جديد </a>
</li>
</ul>
</li>



<li class="nav-item"><a href=""><i class="la la-male"></i>
<span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
<span class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Product::count()}}</span></a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.product')}}"
data-i18n="nav.dash.ecommerce"> عرض كل المنتجات </a>
</li>
<li><a class="menu-item" href="{{route('admin.product.create')}}" data-i18n="nav.dash.crypto"> أضافة منتج جديد
</a>
</li>
</ul>
</li>



<li class="nav-item"><a href=""><i class="la la-male"></i>
<span class="menu-title" data-i18n="nav.dash.main">المتاجر  </span>
<span
class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Vendor::count()}}</span>
</a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.vendors')}}"
data-i18n="nav.dash.ecommerce"> عرض الكل </a>
</li>
<li><a class="menu-item" href="{{route('admin.vendors.create')}}" data-i18n="nav.dash.crypto">  أضافة متجر
</a>
</li>
</ul>
</li>


<li class="nav-item"><a href=""><i class="la la-male"></i>
<span class="menu-title" data-i18n="nav.dash.main"> صلاحيات المستخدم </span>
<span class="badge badge badge-success badge-pill float-right mr-2"><?php echo (App\Models\Vendor::count()); ?></span></a>
<ul class="menu-content">
<li class="active"><a class="menu-item" href="{{route('admin.permission')}}"data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
<li><a class="menu-item" href="{{route('admin.permission.create')}}" data-i18n="nav.dash.crypto">أضافة</a></li>
</ul>
</li>


</ul>
</li>



</ul>
</div>
</div>
