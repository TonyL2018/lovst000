@extends('layouts.app')

@section('content')
<div  class="text-align-center">
    <h1><img src="{{ asset('img/myadd/logo.png') }}"></h1>
</div>
<div class="login-container animated fadeInDown">
    <div class="loginbox bg-white">
        <div class="loginbox-title">パスワード再発行</div>
        <div class="loginbox-or">
            <div class="or-line"></div>
        </div>
        <div class="loginbox-signup" style=" opacity:0.3;">
            メールアドレスにパスワードを送信しました！<br/>
            <a href="{{ route('login') }}" style=" color:#2278cf">ログイン画面へ</a>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

        <div class="loginbox-textbox">
        	<label>メールアドレス入力</label>
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="アカウントID" required>

          @if ($errors->has('email'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="loginbox-textbox">
        	ご登録のメールアドレスを入力して送信ボタンを押してください。<br/>
            ※再発行を行うと古いパスワードではログインできなくなります。
        </div>

        <div class="loginbox-submit">
            <input type="submit" class="btn btn-primary btn-block" value="パスワード再発行">
        </div>
        </form>
    </div>
</div>
@endsection
