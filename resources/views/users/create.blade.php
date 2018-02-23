{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.leftnav')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> アカウント登録</h1>
    <hr>

    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('staff_id', 'アカウントID(スタッフID)') }}
        {{ Form::text('staff_id', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', '表示名') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name_kanji', '姓漢字') }}
        {{ Form::text('last_name_kanji', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kanji', '名漢字') }}
        {{ Form::text('first_name_kanji', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name_kana', '姓カナ') }}
        {{ Form::text('last_name_kana', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kana', '名カナ') }}
        {{ Form::text('first_name_kana', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{ Form::label('roles[]', '権限種別') }}<br>
      <select name="roles[]">
        <option>権限種別を選択</option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
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

    {{ Form::submit('登録', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
