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
      {{ Form::label('detail1', 'アクセス方法') }}
      {{ Form::textarea('detail1', '', array('class' => 'form-control', 'cols' => 10, 'rows' =>2)) }}
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
      {{ Form::label('detail', '備考') }}
      {{ Form::textarea('detail', '', array('class' => 'form-control', 'rows' => '3')) }}
    </div>

    {{ Form::submit('登録', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
<hr>
</div>

@endsection
