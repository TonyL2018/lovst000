@extends('layouts.leftnav')

@section('title', '| Studios')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> スタジオ管理</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>スタジオ ID</th>
                    <th>スタジオ名</th>
                    <th>所属店舗</th>
                    <th>店舗ID</th>
                    <th>編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($shops as $shop)
                @foreach ($shop->studios as $studio)
                <tr>

                    <td>{{ $studio->studio_id }}</td>
                    <td><a href='{{ route('studios.show', $studio->id) }}'>{{ $studio->name }}</a></td>
                    <td>
                        {{$shop->name}}
                    </td>
                    <td>{{ $shop->shop_id }}</td>
                    <td>
                    <a href="{{ route('studios.edit', $studio->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['studios.destroy', $studio->id] ]) !!}
                    {!! Form::submit('停止', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>

        </table>
    </div>
    <br>
    <a href="{{ route('studios.create') }}" class="btn btn-success">スタジオ登録</a>&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
</div>

@endsection
