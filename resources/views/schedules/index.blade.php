@extends('layouts.leftnav')

@section('title', '| Schedules')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> 予約枠作成・編集</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: middle">No.</th>
                    <th rowspan="2" style="vertical-align: middle">適用期間</th>
                    <th rowspan="2" style="vertical-align: middle">店舗名</th>
                    <th rowspan="2" style="vertical-align: middle">スタジオ名</th>
                    <th colspan="5" style="vertical-align: middle">時間枠</th>
                    <th rowspan="2" style="vertical-align: middle">編集</th>
                </tr>
                <tr>
                  <th>コマ1</th>
                  <th>コマ2</th>
                  <th>コマ3</th>
                  <th>コマ4</th>
                  <th>コマ5</th>
                </tr>
            </thead>

            <tbody>
              @if (isset(Auth::user()->store_id))
                @foreach(Auth::user()->shop->studios as $studio)
                @foreach($studio->schedules as $schedule)
                  <tr>
                      <td>{{ $schedule->id }}</td>
                      <td>{{ $schedule->start_date }}~{{ $schedule->end_date }}</td>
                      <td>{{ $shop->name }}</td>
                      <td>{{ $studio->name }}</td>
                      <td>{{ $schedule->coma_1 }}</td>
                      <td>{{ $schedule->coma_2 }}</td>
                      <td>{{ $schedule->coma_3 }}</td>
                      <td>{{ $schedule->coma_4 }}</td>
                      <td>{{ $schedule->coma_5 }}</td>
                      <td>
                      <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['schedules.destroy', $schedule->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
                @endforeach
              @elseif (isset(Auth::user()->fc_id))
                @foreach(Auth::user()->honnbu->shops as $shop)
                @foreach($shop->studios as $studio)
                @foreach($studio->schedules as $schedule)
                  <tr>
                      <td>{{ $schedule->id }}</td>
                      <td>{{ $schedule->start_date }}~{{ $schedule->end_date }}</td>
                      <td>{{ $shop->name }}</td>
                      <td>{{ $studio->name }}</td>
                      <td>{{ $schedule->coma_1 }}</td>
                      <td>{{ $schedule->coma_2 }}</td>
                      <td>{{ $schedule->coma_3 }}</td>
                      <td>{{ $schedule->coma_4 }}</td>
                      <td>{{ $schedule->coma_5 }}</td>
                      <td>
                      <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['schedules.destroy', $schedule->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
                @endforeach
                @endforeach
              @else
                @foreach($honnbus as $honnbu)
                @foreach($honnbu->shops as $shop)
                @foreach($shop->studios as $studio)
                @foreach($studio->schedules as $schedule)
                  <tr>
                      <td>{{ $schedule->id }}</td>
                      <td>{{ $schedule->start_date }}~{{ $schedule->end_date }}</td>
                      <td>{{ $shop->name }}</td>
                      <td>{{ $studio->name }}</td>
                      <td>{{ $schedule->coma_1 }}</td>
                      <td>{{ $schedule->coma_2 }}</td>
                      <td>{{ $schedule->coma_3 }}</td>
                      <td>{{ $schedule->coma_4 }}</td>
                      <td>{{ $schedule->coma_5 }}</td>
                      <td>
                      <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['schedules.destroy', $schedule->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
                @endforeach
                @endforeach
                @endforeach
              @endif
            </tbody>
        </table>
    </div>

    <a href="{{ route('schedules.create') }}" class="btn btn-success">予約枠登録</a>

</div>

@endsection
