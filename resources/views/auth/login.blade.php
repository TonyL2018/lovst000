<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- lovst Styles -->
    <!--Basic Styles-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="{{ asset('css/beyond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/typicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/myadd/newcss.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" -->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- script src="https://use.fontawesome.com/9712be8772.js"></script -->
</head>
<body>
    <div id="app">



        @if(Session::has('flash_message'))
            <div class="container">
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>


        <main class="py-4">
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
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- lovst Scripts -->
    <!--Basic Scripts-->
    <script src="{{ asset('js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!--Beyond Scripts-->
    <script src="{{ asset('js/beyond.min.js') }}"></script>
</body>
</html>
