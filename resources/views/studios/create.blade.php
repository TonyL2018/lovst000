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
    {{ Form::hidden('x', $courses->count()) }}
    <div class="form-group">
      <table class="table table-hover text-align-center">
        <tr>
          <th style='width:15%'>撮影内容選択</th>
          <th style='width:18%'>表示順</th>
          <th style='width:44%'>撮影内容名</th>
          <th style='width:23%'>作成者</th>
        </tr>
        @foreach($courses as $course)
        <tr style="height:40px;">
          <td><input type='checkbox' name='course{{$loop->index}}' value='{{$course->id}}'></td>
          <td><input type='text' style='width:80%;height:25px;padding:5px;' name='order{{$loop->index}}' id='order{{$loop->index}}'></td>
          <td>{{$course->name}}</td>
          <td>{{$course->creator->name}}</td>
        </tr>
        @endforeach
      </table>
    </div>

    {{ Form::submit('作成', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
<hr>
</div>

@endsection
