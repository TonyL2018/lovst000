@extends('layouts.leftnav')

@section('title', '| Add Honnbu')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> フランチャイズ登録</h1>
    <hr>

    {{ Form::open(array('url' => 'honnbus')) }}

    <div class="form-group">
        {{ Form::label('name', 'フランチャイズ名') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('start_date', '契約開始日') }}
        {{ Form::date('start_date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('timelength', '契約期間') }}
        {{ Form::text('timelength', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('corporation', '法人名') }}
        {{ Form::text('corporation', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('representative', '代表者氏名') }}
        {{ Form::text('representative', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('corporation1', '契約者氏名') }}
        {{ Form::text('corporation1', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('capital', '資本金') }}
        {{ Form::text('capital', '', array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{ Form::label('tele_kaisya', '電話番号(会社)') }}
      {{ Form::text('tele_kaisya', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('tele_kojin', '電話番号(携帯)') }}
      {{ Form::text('tele_kojin', '', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
      {{ Form::label('adress', '住所') }}
      {{ Form::text('adress', '', array('class' => 'form-control')) }}

    </div>
    <div class="form-group">
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', '', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('登録', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
<hr>
</div>

@endsection