@extends('layouts.leftnav')

@section('title', '| Edit Occupation')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> スタッフ種別登録</h1>
    <hr>

    {{ Form::model($occupation, array('route' => array('occupations.update', $occupation->id), 'method' => 'PUT')) }}
    <div class='form-group'>
      {{Form::label('name', 'スタッフ種別名')}}
      {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('', '状態') }}
        <br>
        <input type='radio' value='1' name='delete_flg' @if($occupation->delete_flg == 1) checked @endif/>&nbsp;無効
        <input type='radio' value='0' name='delete_flg' @if($occupation->delete_flg == 0) checked @endif/>&nbsp;有効
    </div>
    <br>
    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
