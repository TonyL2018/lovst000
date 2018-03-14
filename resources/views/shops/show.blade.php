@extends('layouts.leftnav')

@section('title', '| Display Shop')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 店舗管理：店舗詳細</h1>
    <hr>

    <table class="table table-hover text-align-center">
      <tr>
        <td style="text-align:left; vertical-align: middle">{{Form::label('fc_id', '所属FC')}}</td>
        <td style="text-align:left; vertical-align: middle">
          <select name="fc_id">
            <option></option>
            @foreach ($honnbus as $honnbu)
                <option value="{{$honnbu->id}}" @if($shop->fc_id == $honnbu->id) selected @endif>{{$honnbu->name}}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '店舗名') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->name }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '住所') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->address }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', 'アクセス方法') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->route }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '電話番号') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->telephone }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', 'メールアドレス') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->email }}</td>
      </tr>
      <tr>
        <td style="text-align:left; vertical-align: middle">{{ Form::label('', '備考') }}</td>
        <td style="text-align:left; vertical-align: middle">{{ $shop->detail }}</td>
      </tr>
    </table>

<hr>
<a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-primary" style="margin-right: 3px;">編集</a>&nbsp;
<button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
</div>

@endsection
