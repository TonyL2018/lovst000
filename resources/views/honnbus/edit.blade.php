@extends('layouts.leftnav')

@section('title', '| Edit Honnbu')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 編集 {{$honnbu->name}}</h1>
    <hr>

    {{ Form::model($honnbu, array('route' => array('honnbus.update', $honnbu->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fc_name', 'フランチャイズ名') }}
        <br><input type="text" name='fc_name' id='fc_name' value='{{ $honnbu->name }}' class='form-control' />
    </div>

    <div class="form-group">
        {{ Form::label('start_date', '契約開始日') }}
        {{ Form::date('start_date', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('duration', '契約期間') }}
        {{ Form::text('duration', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('corporation', '法人名') }}
        {{ Form::text('corporation', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('representative', '代表者氏名') }}
        {{ Form::text('representative', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('signer', '契約者氏名') }}
        {{ Form::text('signer', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('capital', '資本金') }}
        {{ Form::text('capital', null, array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{ Form::label('tele_kaisya', '電話番号(会社)') }}
      {{ Form::text('tele_kaisya', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('tele_kojin', '電話番号(携帯)') }}
      {{ Form::text('tele_kojin', null, array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
      {{ Form::label('adress', '住所') }}
      {{ Form::text('adress', null, array('class' => 'form-control')) }}

    </div>
    <div class="form-group">
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', null, array('class' => 'form-control', 'rows' => '3')) }}

    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}

</div>

@endsection
