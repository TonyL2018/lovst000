{{-- \resources\views\errors\401.blade.php --}}
@extends('layouts.leftnav')

@section('content')
    <div class='col-lg-10 col-lg-offset-1'>
      <br><br><br>
        <a href="{{ route('passwords.index') }}" class="btn btn-default pull-right">パスワード変更</a>
        <h1><center>現在のパスワードが正しく入力されていません！</center></h1>
    </div>
@endsection
