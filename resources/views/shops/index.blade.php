@extends('layouts.leftnav')

@section('title', '| Shops')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> 店舗管理</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>店舗 ID</th>
                    <th>店舗名</th>
                    <th>スタジオ名</th>
                    <th>所属FC</th>
                    <th>編集</th>
                </tr>
            </thead>

            <tbody>
              @foreach($honnbus as $honnbu)
                @foreach ($honnbu->shops as $shop)
                <tr>

                    <td>{{ $shop->shop_id }}</td>
                    <td>{{ $shop->name }}</td>
                    <td>
                    @foreach($shop->studios as $studio)
                      {{$studio->name}}<br>
                    @endforeach
                    </td>
                    <td>
                      <select>
                            <option value="{{$shop->fc_id}}" selected>{{$honnbu->name}}</option>
                      </select>
                    </td>
                    <td>
                    <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">編集</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['shops.destroy', $shop->id] ]) !!}
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
    <a href="{{ route('shops.create') }}" class="btn btn-success">店舗登録</a>&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
</div>

@endsection
