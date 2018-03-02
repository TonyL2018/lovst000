@extends('layouts.leftnav')

@section('title', '| Courses')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> プラン一覧</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle">プランID</th>
                    <th style="vertical-align: middle">プラン名</th>
                    <th style="vertical-align: middle">作成者</th>
                    <th style="vertical-align: middle">状態</th>
                    <th style="vertical-align: middle">登録しているスタジオ</th>
                    <th style="vertical-align: middle">編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                  <tr>
                      <td>{{ $course->id }}</td>
                      <td>{{ $course->name }}</td>
                      <td>{{ $course->creator->name }}</td>
                      <td>@if($course->delete_flg) 無効 @else 有効 @endif</td>
                      <td></td>
                      <td>
                      <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('courses.create') }}" class="btn btn-success">プラン登録</a>

</div>

@endsection
