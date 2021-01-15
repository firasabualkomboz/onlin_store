@extends('layouts.app')
@section('style')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    .data-cart div{
        margin: 5px;
    }


</style>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <p class="mb-4">
                Total Amount is <strong> ${{ $amount}}</strong>
            </p>

            <form action="/charge" method="post" id="payment-form">
            @csrf
                <div class="">
                    <input type="hidden" name="amount" value="{{ $amount}}">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <button class="btn btn-primary mt-3">Submit Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    window.onload = function() {
            var stripe = Stripe('pk_test_51HcbQsEtwbKtbCp5wsXI1VBTByuaUBSXds0EbYilrfhkqITH5eJkN5UH9vAsAiuEuEhHPjzOLbOkdU5RPFRcmbaM007R88m3nf');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        }
</script>





<section>

    <div dir="rtl" style="text-align: right"   class="col-lg-12">
        <div class="product__details__tab">
            <ul style="text-align: right" class="nav nav-tabs" role="tablist">

                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                aria-selected="true">تفاصيل الشراء</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"aria-selected="false">حالة الطلب </a>
                </li>

            </ul>

            <div id="addcart" class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6>التوصيل</h6>

                            <form>

                                <div class="row data-cart">
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="الاسم الأول ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="اسم العائلة ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="الدولة ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="المدينة">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="العنوان بالتفصيل ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="تفاصيل اكثر للعنوان">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="رقم جوال ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="رقم جوال اخر">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="البريد الإلكتروني  ">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="ملاحظات للطلب">
                                    </div>
                                    <div class="col-lg-8">
                                        <button class="btn btn-primary">إرسال المعلومات </button>
                                    </div>
                                </div>

                              </form>


                    </div>
                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6>تفاصيل عن طلب الزبون </h6>

                        <p>
                            <div class="alert alert-primary" role="alert">
             لا يوجد اي رسالة بعد
                              </div>

                          </p>
                    </div>
                </div>






            </div>
        </div>
    </div>
</section>


@endsection

