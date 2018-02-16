@extends('layouts.app')

@section('content')
<div  class="text-align-center">
    <h1><img src="{{ asset('img/myadd/logo.png') }}"></h1>
</div>
<div class="login-container animated fadeInDown">
    <div class="loginbox bg-white">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
        <div class="loginbox-title">ログイン</div>
        <div class="loginbox-or">
            <div class="or-line"></div>
        </div>
        <div class="loginbox-signup" style=" opacity:0.1;">
            アカウントまたはパスワードエラー！
        </div>
        <div class="loginbox-textbox">
            <label>アカウントID</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>
        <div class="loginbox-textbox">
            <label>パスワード</label>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <!-- div class="loginbox-textbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
        </div -->
        <div class="loginbox-forgot">
            <a href="{{ route('password.request') }}">パスワード再発行</a>
        </div>

        <div class="loginbox-submit">
            {{Form::submit('ログイン', array('class'=>'btn btn-primary btn-block'))}}
        </div>
        </form>

    </div>
</div>
@endsection
