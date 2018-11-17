@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Register</h2>
            <p>Get more access to personal account, join for free</p>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="row login">
                <div class="col-md-3">
                        <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                </div>
                <div class="col-md-9">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                </div>
            </div>
            <div class="row login">
                <div class="col-md-3">
                    <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="col-md-9">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="row login">
                <div class="col-md-3">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                </div>
                <div class="col-md-9">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row login">
                <div class="col-md-3">
                    <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                </div>
                <div class="col-md-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="row login">
                <div class="col-md-12">
                        <button type="submit" class="btn btn-primary registbtn float-right">
                                {{ __('Register') }}
                        </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
