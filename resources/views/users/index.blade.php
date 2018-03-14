{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.leftnav')

@section('title', '| Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> アカウント管理
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">権限</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>表示名</th>
                    <th>メールアドレス</th>
                    <th>入店日</th>
                    <th>権限種別</th>
                    <th>編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {!! Form::submit('停止', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <br>
    <a href="{{ route('users.create') }}" class="btn btn-success">アカウント登録</a>&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>

</div>

@endsection
