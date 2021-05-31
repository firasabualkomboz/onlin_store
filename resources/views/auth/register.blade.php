@extends('layouts.app')

@section('content')

<div class="container">
<div class="row shadow mt-5" style="border-radius: 10px">

<div class="col-lg-6 body-lgoin-page">
<div class="text-body mt-5">
<h4>Welcome to zajil </h4>
<p>Lorem ipsum dolor sit amet coansectetur adipisicing elit. Blanditiis aperiam animi consequatur deleniti molestias quod consequuntur, est porro. Eaque soluta, aliquam possimus sapiente dolorem labore voluptas maiores velit impedit dolore</p>
</div>
</div>

<div class="col-lg-6">

<div class="flash-message">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach
</div>


<form class="mt-5 form-login" method="POST" action="{{ route('register') }}">
@csrf

<h4>Sign Up </h4>

<div class="mb-3 mt-5">

<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>@enderror

</div>

<div class="mb-3 mt-5">
<input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
@error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
</div>

<div class="mb-3 mt-5">
<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
@error('password')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>@enderror
</div>

<div class="mb-3 mt-5">
<input id="password-confirm" placeholder="Password Confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>

<button type="submit" class="btn btn-primary mt-3 mb-3">Register</button>

</form>
</div>
</div>

</div>




@endsection
