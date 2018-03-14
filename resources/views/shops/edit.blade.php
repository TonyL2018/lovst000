@extends('layouts.leftnav')

@section('title', '| Edit Shop')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 店舗内容編集</h1>
    <hr>

    {{ Form::model($shop, array('route' => array('shops.update', $shop->id), 'method' => 'PUT')) }}
    <div class='form-group'>
      {{Form::label('fc_id', '所属FC')}}
      <br>
      <select name="fc_id">
        <option></option>
        @foreach ($honnbus as $honnbu)
            <option value="{{$honnbu->id}}" @if($shop->fc_id == $honnbu->id) selected @endif>{{$honnbu->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('name', '店舗名') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('address', '住所') }}
      {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('post', '〒') }}
      {{ Form::text('post', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('route', 'アクセス方法') }}
      {{ Form::textarea('route', null, array('class' => 'form-control', 'cols' => 10, 'rows' =>2)) }}
    </div>
    <div class="form-group">
      {{ Form::label('telephone', '電話番号') }}
      {{ Form::text('telephone', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('email', 'メールアドレス') }}
      {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('', '定休日') }}
      <br>
      @php
      $weeks1 = -1; $day_week1 = -1;
      $weeks2 = -1; $day_week2 = -1;
      if($shop->holidays->count() >= 1)
      {
        $weeks1 = $shop->holidays[0]->weeks; $day_week1 = $shop->holidays[0]->day_week;
      }
      if($shop->holidays->count() >= 2)
      {
        $weeks2 = $shop->holidays[1]->weeks; $day_week2 = $shop->holidays[1]->day_week;
      }
      @endphp
      <select name='weeks1'>
        <option>週目を選択</option>
        <option value='0' @if($weeks1 == 0) selected @endif>毎週</option>
        <option value='1' @if($weeks1 == 1) selected @endif>第一</option>
        <option value='2' @if($weeks1 == 2) selected @endif>第二</option>
        <option value='3' @if($weeks1 == 3) selected @endif>第三</option>
        <option value='4' @if($weeks1 == 4) selected @endif>第四</option>
        <option value='5' @if($weeks1 == 5) selected @endif>第五</option>
      </select>
      <select name='day_week1'>
        <option>曜日を選択</option>
        <option value='0' @if($day_week1 == 0) selected @endif>日曜日</option>
        <option value='1' @if($day_week1 == 1) selected @endif>月曜日</option>
        <option value='2' @if($day_week1 == 2) selected @endif>火曜日</option>
        <option value='3' @if($day_week1 == 3) selected @endif>水曜日</option>
        <option value='4' @if($day_week1 == 4) selected @endif>木曜日</option>
        <option value='5' @if($day_week1 == 5) selected @endif>金曜日</option>
        <option value='6' @if($day_week1 == 6) selected @endif>土曜日</option>
      </select>
      <select name='weeks2'>
        <option>週目を選択</option>
        <option value='0' @if($weeks2 == 0) selected @endif>毎週</option>
        <option value='1' @if($weeks2 == 1) selected @endif>第一</option>
        <option value='2' @if($weeks2 == 2) selected @endif>第二</option>
        <option value='3' @if($weeks2 == 3) selected @endif>第三</option>
        <option value='4' @if($weeks2 == 4) selected @endif>第四</option>
        <option value='5' @if($weeks2 == 5) selected @endif>第五</option>
      </select>
      <select name='day_week2'>
        <option>曜日を選択</option>
        <option value='0' @if($day_week2 == 0) selected @endif>日曜日</option>
        <option value='1' @if($day_week2 == 1) selected @endif>月曜日</option>
        <option value='2' @if($day_week2 == 2) selected @endif>火曜日</option>
        <option value='3' @if($day_week2 == 3) selected @endif>水曜日</option>
        <option value='4' @if($day_week2 == 4) selected @endif>木曜日</option>
        <option value='5' @if($day_week2 == 5) selected @endif>金曜日</option>
        <option value='6' @if($day_week2 == 6) selected @endif>土曜日</option>
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', null, array('class' => 'form-control', 'rows' => '3')) }}
    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
<hr>
</div>

@endsection
