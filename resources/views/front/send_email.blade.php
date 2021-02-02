@extends('layouts.bodyfront')

@section('content')
    @include('front.include.header-top')

    <section class="send_email_form">
        <div class="container">
            <h2 class="text-center">تواصل معنا برسالة </h2>
            @include('errors.validate')
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form method="post" action="{{url('/sendemail/send')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>اسم المرسل</label>
                    <input type="text" class="form-control" name="name" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">البريد الألكتروني</label>
                    <input type="email" class="form-control" name="email">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">الرسالة</label>
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn primary-btn" type="submit" name="send">send </button>
                </div>
            </form>

        </div>
    </section>

@endsection
