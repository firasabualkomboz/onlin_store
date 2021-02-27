@extends('layouts.bodyfront')

@section('content')
    @include('front.include.loder')
    @include('front.include.header-top')

    <section class="who_are_we">

        <div class="container">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ماذا يقدم متجر زاجل
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            يقدم المتجر منتجات بكافة الانواع منها الفاشون والالكترونيات وغيرها ويتم شرائها عبر المتجر من خلال الدفع الكترونياً ويتم توصيل المنتج للشخص الذي قام بطلب المنتج
                        </div>
                    </div>
                </div>

                
            </div>
        </div>

    </section>

@endsection
