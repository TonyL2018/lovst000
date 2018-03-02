@extends('layouts.leftnav')

@section('title', '| Occupations')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> スタッフ種別一覧</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle">種別No.</th>
                    <th style="vertical-align: middle">スタッフ種別</th>
                    <th style="vertical-align: middle">状態</th>
                    <th style="vertical-align: middle">編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach($occupations as $occupation)
                  <tr>
                      <td>{{ $occupation->id }}</td>
                      <td>{{ $occupation->name }}</td>
                      <td>@if($occupation->delete_flg) 無効 @else 有効 @endif</td>
                      <td>
                      <a href="{{ route('occupations.edit', $occupation->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['occupations.destroy', $occupation->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('occupations.create') }}" class="btn btn-success">メールテンプレ登録</a>

</div>

@endsection
