@extends('layouts.leftnav')

@section('title', '| Add Template')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> メールテンプレ作成</h1>
    <hr>

    {{ Form::open(array('url' => 'templates')) }}
    <div class='form-group'>
      {{Form::label('name', '表示名')}}
      {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('title', '件名') }}
        {{ Form::text('title', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('status', '関連ステータス') }}
      <br>
      <select name="status">
        <option></option>
        @foreach ($statuses as $status)
            <option value="{{$status->id}}">{{$status->status}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('content', '内容') }}
      {{ Form::textarea('content', '', array('class' => 'form-control', 'cols' => 10, 'rows' =>8)) }}
    </div>

    {{ Form::submit('登録', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
<hr>
</div>

@endsection
