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
          @if($status->status == '詳細メール' || $status->status == '撮影30日前通知' || $status->status == '撮影前日通知' || $status->status == 'メルマガ')
            <option value="{{$status->id}}">{{$status->status}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('content', '内容') }}
      {{ Form::textarea('content', '', array('class' => 'form-control', 'cols' => 10, 'rows' =>8)) }}
    </div>

    {{ Form::submit('作成', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
