@extends('layouts.leftnav')

@section('title', '| Edit Password')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> パスワード変更</h1>
    <hr>

    {{ Form::open(['method' => 'PUT', 'route' => ['passwords.update', $user->id] ]) }}
    <div class="form-group">
        {{ Form::label('password_current', '現在のパスワード') }}<br>
        {{ Form::password('password_current', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', '新しいパスワード') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', '新しいパスワード再入力') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('パスワード変更', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
