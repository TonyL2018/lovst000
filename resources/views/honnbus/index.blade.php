@extends('layouts.leftnav')

@section('title', '| Honnbus')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> フランチャイズ管理</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>フランチャイズ ID</th>
                    <th>フランチャイズ名</th>
                    <th>所属店舗</th>
                    <th>編集</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($honnbus as $honnbu)
                <tr>

                    <td>{{ $honnbu->id }}</td>
                    <td>{{ $honnbu->name }}</td>
                    <td>
                      @foreach($honnbu->shops as $shop)
                        <a href="{{ route('shops.show', $shop->id) }}">{{$shop->name}}</a>&nbsp;
                      @endforeach
                    </td>
                    <td>
                    <a href="{{ route('honnbus.edit', $honnbu->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['honnbus.destroy', $honnbu->id] ]) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('honnbus.create') }}" class="btn btn-success">フランチャイズ登録</a>

</div>

@endsection
