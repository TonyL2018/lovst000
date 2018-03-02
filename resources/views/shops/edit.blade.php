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
      {{ Form::label('detail1', 'アクセス方法') }}
      {{ Form::textarea('detail1', null, array('class' => 'form-control', 'cols' => 10, 'rows' =>2)) }}
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
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', null, array('class' => 'form-control', 'rows' => '3')) }}
    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
<hr>
</div>

@endsection
