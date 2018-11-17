@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 loginbox">
            <h2>Login</h2>
            <p>More Accessable Receipes</p>
            <hr>
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row login">
                <div class="col-md-3">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="col-md-9">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        
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
                <div class="col-md-12"> 
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
                            </label>
                        </div>  
                </div>
            </div>
            <div class="row login">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning loginbtn">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-6 regbox">
            <h3 class="text-center">New to Resep Kita?</h3>
            <div class="centeredbtn">
                <a href="{{route('register')}}" class="btn registerbtn" role="button">{{_('Register')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection
