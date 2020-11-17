@extends('layouts.admin')
@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الأقسام الفرعية </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الأقسام الفرعية
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع الأقسام الفرعية </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.include.alerts.success')
                            @include('admin.include.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                        <tr>
                                            <th>اسم المنتج </th>
                                            <th>  القسم الرئيسي  </th>
                                            <th>  القسم الفرعي  </th>
                                             <th>صورة المنتج (1) </th>
                                             <th>صورة المنتج (2) </th>
                                             <th>سعر المنتج </th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

@isset($product)
@foreach ($product as $product)
<tr>

    <td> {{$product->name}} </td>
    {{-- <td>{{$product->mainsection->name}} </td> --}}
{{-- <td> {{$mainsection->name}}</td> --}}
    <td> ؟؟ </td>

    <td> <img style="width: 100px" height="100px" src="{{$product->photoone}} " alt="">  </td>
    <td> ؟؟ </td>
    <td>  {{$product->price }} $  </td>
    <td>

        <div class="btn-group" role="group"
             aria-label="Basic example">
    <a href="{{route('admin.maincategories.edit',$product -> id)}}"
               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>



               <a href="{{route('admin.product.delete',$product -> id)}}"
                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

    <a href="{{route('admin.maincategories.status',$product -> id)}}" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"> @if($product ->active ==0)
        تفعيل
        @else
        إلغاء تفعيل
        @endif
    </a>


        </div>
    </td>
</tr>
@endforeach
                                            @endisset






                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
