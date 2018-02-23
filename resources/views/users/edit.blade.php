{{-- \resources\views\users\edit.blade.php --}}

@extends('layouts.leftnav')

@section('title', '| Edit User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 編集 {{$user->name}}</h1>
    <hr>

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', '表示名') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{Form::label('roles[]', '権限種別')}}
      <br>
      <select name="roles[]">
        <option>権限種別を選択</option>
        @foreach ($roles as $role)
            @if($user->hasRole($role->name))
            <option value="{{$role->id}}" selected>{{$role->name}}</option>
            @else
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endif

        @endforeach
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('fc_id', '所属')}}<br>
      <select name="fc_id">
        <option></option>
        @foreach ($honnbus as $honnbu)
            @if($user->fc_id == $honnbu->id)
            <option value="{{$honnbu->id}}" selected>{{$honnbu->name}}</option>
            @else
            <option value="{{$honnbu->id}}">{{$honnbu->name}}</option>
            @endif

        @endforeach
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'パスワード') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm パスワード') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
<div style=" width:80%; margin:10px 10%;  height:10px; background:#f3f3f3;"></div>
@endsection
