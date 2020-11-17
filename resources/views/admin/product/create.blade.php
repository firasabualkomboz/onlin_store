@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.vendors')}}">المنتجات   </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة منتج جديد
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة منتج جديد   </h4>
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
                                    <div class="card-body">
<form class="form" action="{{route('admin.product.store')}}" method="POST"
 enctype="multipart/form-data">
    @csrf


<div class="form-group">
<label>صورة للمنتج ( 1 )  </label>
<label id="projectinput7" class="file center-block">
<input type="file" id="file" name="photoone">
<span class="file-custom"></span>
</label>
@error('photoone')<span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
    <label>صورة للمنتج ( 2 )  </label>
    <label id="projectinput7" class="file center-block">
    <input type="file" id="file" name="phototwo">
    <span class="file-custom"></span>
    </label>
    @error('phototwo')<span class="text-danger">{{$message}}</span>@enderror
    </div>



                                            <div class="form-body">
 <h4 class="form-section"><i class="ft-home"></i> بيانات المنتج الجديد </h4>


<div class="row">

<div class="col-md-6">


<div class="form-group">
<label for="projectinput1"> اسم المنتج  </label>
<input type="text" value="" id="name"  class="form-control"  placeholder="" name="name">
@error("name") <span class="text-danger">{{$message}}</span>@enderror
</div>


</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput2"> أختر القسم </label>
<select name="main_category_id" class="select2 form-control">
<optgroup label="من فضلك أختر القسم ">
@if($maincategory && $maincategory -> count() > 0)
@foreach ($maincategory as $maincategory)
<option  value="{{$maincategory -> id }}">{{$maincategory -> name}}</option>
@endforeach
@endif
</optgroup>
</select>
@error('main_category_id') <span class="text-danger"> {{$message}}</span> @enderror
</div>
</div>



 </div>

 <div class="row">

    <div class="col-md-6">


    <div class="form-group">
    <label for="projectinput1"> سعر المنتج   </label>
    <input type="text" value="" id="price"  class="form-control"  placeholder="" name="price">
    @error("price") <span class="text-danger">{{$message}}</span>@enderror
    </div>


    </div>


    {{-- <div class="col-md-6">
    <div class="form-group">
    <label for="projectinput2"> القسم الفرعي إختياري  </label>
    <select name="sub_section_id" class="select2 form-control">
    <optgroup label="من فضلك أختر القسم ">
    @if($subsection && $subsection -> count() > 0)
    @foreach ($subsection as $subsection)
    <option  value="{{$subsection -> id }}">{{$subsection -> name}}</option>
    @endforeach
    @endif
    </optgroup>
    </select>
    @error('sub_section_id') <span class="text-danger"> {{$message}}</span> @enderror
    </div>
    </div> --}}



     </div>








                                                <div class="row">


{{--
<div class="col-md-6">
<div class="form-group mt-1">
<input type="checkbox" value="1" name="abbr" id="switcheryColor4"class="switchery" data-color="success"checked/>
<label for="switcheryColor4" class="card-title ml-1"> اللغة الافتراضية  </label>
{{-- @error("category.$index.active")
<span class="text-danger"> </span>
@enderror
</div>
</div> --}}



{{-- <div class="col-md-6">
<div class="form-group mt-1">
<input type="checkbox" value="1"  name="active"  id="switcheryColor4"
class="switchery" data-color="success"
checked/>
<label for="switcheryColor4"
class="card-title ml-1">الحالة </label>
@error("active")
<span class="text-danger"> </span>@enderror
</div>
</div> --}}


                                                </div>

                                            </div>




                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection



