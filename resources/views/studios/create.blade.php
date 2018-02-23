@extends('layouts.leftnav')

@section('title', '| Add Studio')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> スタジオ登録</h1>
    <hr>

    {{ Form::open(array('url' => 'studios')) }}
    <div class='form-group'>
      {{Form::label('store_id', '店舗名')}}
      <br>
      <select name="store_id">
        <option></option>
        @foreach ($shops as $shop)
            <option value="{{$shop->id}}">{{$shop->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'スタジオ名') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
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
