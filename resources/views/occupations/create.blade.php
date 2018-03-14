@extends('layouts.leftnav')

@section('title', '| Add Occupation')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> スタッフ種別登録</h1>
    <hr>

    {{ Form::open(array('url' => 'occupations')) }}
    <div class='form-group'>
      {{Form::label('name', 'スタッフ種別名')}}
      {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('', '状態') }}
        <br>
        {{ Form::radio('delete_flg', '1', array('class' => 'form-control')) }}&nbsp;無効
        {{ Form::radio('delete_flg', '0', array('class' => 'form-control')) }}&nbsp;有効
    </div>
    <br>
    {{ Form::submit('作成', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
