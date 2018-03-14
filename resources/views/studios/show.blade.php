@extends('layouts.leftnav')

@section('title', '| Display Studio')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> スタジオ詳細</h1>
    <hr>

    <table class="table table-hover text-align-center">
      <tr>
        <td style="text-align:left; vertical-align: middle">{{Form::label('', 'スタジオID')}}</td>
        <td style="text-align:left; vertical-align: middle">
          {{ $studio->id }}
        </td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '登録日') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ date('Y-m-d',strtotime($studio->created_at)) }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '店舗名') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $studio->shop->name }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', 'スタジオ名') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $studio->name }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '備考') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $studio->detail }}</td>
      </tr>
    </table>
    <br>
    <table class="table table-hover text-align-center">
      <tr>
        <th style="text-align:left; vertical-align: middle">{{Form::label('', '表示順')}}</th>
        <th style="text-align:left; vertical-align: middle">{{Form::label('', '撮影内容名')}}</th>
        <th style="text-align:left; vertical-align: middle">{{Form::label('', '作成者')}}</th>
      </tr>
      @foreach($studio->courses as $course)
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ $course->sort_num }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $course->course->name }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $course->course->creator->name }}</td>
      </tr>
      @endforeach
    </table>
    <br>
    @if(isset($schedule))
    <table class="table table-hover text-align-center">
      <tr>
        <td style="text-align:left; vertical-align: middle" colspan="2">適用期間: {{$schedule->start_date}}~{{$schedule->end_date}}</td>
      </tr>
      <tr>
        <th style="text-align:left; vertical-align: middle">{{Form::label('', 'コマ')}}</th>
        <th style="text-align:left; vertical-align: middle">{{Form::label('', '時間枠')}}</th>
      </tr>
      @php
        for($i = 1; $i <= 20; $i++)
        {
          if(!empty($schedule->{'coma_'.$i}))
          {
        @endphp
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ $i }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $schedule->{'coma_'.$i} }}</td>
      </tr>
        @php
          }
        }
      @endphp
    </table>
    @endif

<hr>
<a href="{{ route('studios.edit', $studio->id) }}" class="btn btn-primary" style="margin-right: 3px;">編集</a>&nbsp;
<button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
</div>

@endsection
