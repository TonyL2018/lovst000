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
        @php
        $checked = false;
        $sortNum = 0;
        @endphp
        <tr style="height:40px;">
          @foreach($studio->courses as $_course)
          @if($_course->course_id == $course->id)
          @php
          $checked = true;
          $sortNum = $_course->sort_num;
          @endphp
          @endif
          @endforeach
          <td><input type='checkbox' @php if($checked == true){ @endphp checked @php } @endphp name='course{{$loop->index}}' value='{{$course->id}}'></td>
          <td><input type='text' style='width:80%;height:25px;padding:5px;' name='order{{$loop->index}}' @php if($checked == true){ @endphp value='{{$sortNum}}' @php } @endphp></td>
          <td>{{$course->name}}</td>
          <td>{{$course->creator->name}}</td>
        </tr>
        @endforeach
      </table>
    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
<hr>
</div>

@endsection
