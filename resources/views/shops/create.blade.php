@extends('layouts.leftnav')

@section('title', '| Add Shop')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 店舗登録</h1>
    <hr>

    {{ Form::open(array('url' => 'shops')) }}
    <div class='form-group'>
      {{Form::label('fc_id', '所属FC')}}
      <br>
      <select name="fc_id">
        <option></option>
        @foreach ($honnbus as $honnbu)
            <option value="{{$honnbu->id}}">{{$honnbu->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('name', '店舗名') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('address', '住所') }}
      {{ Form::text('address', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('post', '〒') }}
      {{ Form::text('post', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('route', 'アクセス方法') }}
      {{ Form::textarea('route', '', array('class' => 'form-control', 'cols' => 10, 'rows' =>2)) }}
    </div>
    <div class="form-group">
      {{ Form::label('telephone', '電話番号') }}
      {{ Form::text('telephone', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('email', 'メールアドレス') }}
      {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('', '定休日') }}
      <br>
      <select name='weeks1'>
        <option>週目を選択</option>
        <option value='0'>毎週</option>
        <option value='1'>第一</option>
        <option value='2'>第二</option>
        <option value='3'>第三</option>
        <option value='4'>第四</option>
        <option value='5'>第五</option>
      </select>
      <select name='day_week1'>
        <option>曜日を選択</option>
        <option value='0'>日曜日</option>
        <option value='1'>月曜日</option>
        <option value='2'>火曜日</option>
        <option value='3'>水曜日</option>
        <option value='4'>木曜日</option>
        <option value='5'>金曜日</option>
        <option value='6'>土曜日</option>
      </select>
      <select name='weeks2'>
        <option>週目を選択</option>
        <option value='0'>毎週</option>
        <option value='1'>第一</option>
        <option value='2'>第二</option>
        <option value='3'>第三</option>
        <option value='4'>第四</option>
        <option value='5'>第五</option>
      </select>
      <select name='day_week2'>
        <option>曜日を選択</option>
        <option value='0'>日曜日</option>
        <option value='1'>月曜日</option>
        <option value='2'>火曜日</option>
        <option value='3'>水曜日</option>
        <option value='4'>木曜日</option>
        <option value='5'>金曜日</option>
        <option value='6'>土曜日</option>
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', '', array('class' => 'form-control', 'rows' => '3')) }}
    </div>

    {{ Form::submit('作成', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
<hr>
</div>

@endsection
