@extends('layouts.leftnav')

@section('title', '| Edit Studio')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> スタジオ編集</h1>
    <hr>

    {{Form::model($studio, array('route'=>array('studios.update', $studio->id), 'method'=>'PUT'))}}
    <div class='form-group'>
      {{Form::label('store_id', '店舗名')}}
      <br>
      <select name="store_id">
        <option></option>
        @foreach ($shops as $shop)
            <option value="{{$shop->id}}" @if($studio->shop->id == $shop->id) selected @endif>{{$shop->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'スタジオ名') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
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
