@extends('auth.layout')

@section('content')
<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form class="login-form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{ __('Reset Password') }}</h5>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}<i class="icon-circle-right2 ml-2"></i></button>
                </div>
                <a href="{{ route('login') }}">
                <i class="icon-arrow-left52"></i> {{ __('Back to Login Page') }}
                </a>
            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
@endsection