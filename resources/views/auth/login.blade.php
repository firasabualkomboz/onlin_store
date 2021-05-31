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

<form class="mt-5 form-login" method="POST" action="{{ route('login') }}">
@csrf

<h4>Sign in </h4>

<div class="mb-3 mt-5">
<input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="mb-3 mt-5">
<input id="password" type="password"  placeholder="Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="mb-3 form-check mt-5">
<input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
<label class="form-check-label" for="remember">Always Remember me</label>
</div>

<button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
<br>
@if (Route::has('password.request'))
<a class="btn-link mt-3" href="{{ route('password.request') }}">{{ __('Forget your password ? ') }}</a>
@endif

</form>
</div>
</div>

</div>



@endsection
