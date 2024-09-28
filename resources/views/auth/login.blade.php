@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form method="POST" action="{{ route('admin.login.submit') }}" class="card auth_form">

                @csrf

                    <div class="header">
                          <img src="{{asset('images/logo.png')}}"  width="" height="135px"><p><br><b>LOGIN IN</b></p>
                 </div>
                 <div class="body">
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username Or Email">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="remember">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 text-black" href="{{ route('register') }}">
                                {{ __('Get Registered') }}
                            </a>
                        </div>

                    </div>
                     <div class="col-lg-12">

                         @if (Route::has('password.request'))
                             <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                 {{ __('Forgot your password?') }}
                             </a>
                         @endif
                             <button type="submit" class="btn btn-block waves-effect waves-light" style="background: #405faf; color: white;"><i class="fa-sign-in-alt"></i> Login In</button>

                     </div>

            </div>
        </form>

    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{ asset('images/bg-auth.png') }}" alt="Sign In"/>
        </div>
    </div>
</div>
</div>
</div>







@endsection
