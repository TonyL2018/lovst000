@extends('layouts.leftnav')

@section('title', '| Templates')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> メールテンプレ一覧</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle">テンプレID</th>
                    <th style="vertical-align: middle">表示名</th>
                    <th style="vertical-align: middle">関連ステータス</th>
                    <th style="vertical-align: middle">作成者</th>
                    <th style="vertical-align: middle">編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach($templates as $template)
                  <tr>
                      <td>{{ $template->id }}</td>
                      <td>{{ $template->name }}</td>
                      <td>{{ $template->_status->status }}</td>
                      <td>{{ $template->owner->name }}</td>
                      <td>
                      <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['templates.destroy', $template->id] ]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('templates.create') }}" class="btn btn-success">メールテンプレ登録</a>

</div>

@endsection
