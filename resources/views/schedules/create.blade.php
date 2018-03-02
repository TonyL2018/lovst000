@extends('layouts.leftnav')

@section('title', '| Add Schedule')

@section('content')
<script>
function changeShop()
{
   document.getElementById("status").value = 'select';
   document.getElementById("addSchedule").submit();
}
function submitSchedule()
{
  document.getElementById("status").value = 'submit';
  document.getElementById("addSchedule").submit();
}
</script>
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 予約枠登録</h1>
    <hr>

    {{ Form::open(array('url' => 'schedules', 'id' => 'addSchedule')) }}
    {{ Form::hidden('status', '', array('id' => 'status')) }}
    <div class='form-group'>
      {{Form::label('store_id', '店舗名')}}
      <br>
      <select name="store_id" onchange="changeShop()">
        <option></option>
        @if(isset(Auth::user()->store_id))
          <option value="{{Auth::user()->shop->id}}" @if(isset($store_id) && Auth::user()->shop->id == $store_id) selected @endif>{{Auth::user()->shop->name}}</option>
        @elseif(isset(Auth::user()->fc_id))
          @foreach (Auth::user()->honnbu->shops as $shop)
              <option value="{{$shop->id}}" @if(isset($store_id) && $shop->id == $store_id) selected @endif>{{$shop->name}}</option>
          @endforeach
        @else
          @foreach ($honnbus as $honnbu)
            @foreach ($honnbu->shops as $shop)
                <option value="{{$shop->id}}" @if(isset($store_id) && $shop->id == $store_id) selected @endif>{{$shop->name}}</option>
            @endforeach
          @endforeach
        @endif
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('studio_id', 'スタジオ名')}}
      <br>
      <select name="studio_id">
        <option></option>
        @if(isset($studios))
          @foreach ($studios as $studio)
              <option value="{{$studio->id}}">{{$studio->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('', '適用期間') }}
        <table class="table table-hover text-align-center">
          <tr>
            <td>{{ Form::date('start_date', '', array('class' => 'form-control')) }}</td>
            <td>～</td>
            <td>{{ Form::date('end_date', '', array('class' => 'form-control')) }}</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:left;">※適用期間は設定月の3ヶ月目以降から設定可能です。</td>
          </tr>
        </table>
    </div>
    <div class="form-group">
      <table class="table table-hover text-align-center">
        <tr>
          <th>コマ</th>
          <th>時間枠</th>
          <th></th>
        </tr>
        <tr>
          <td>1</td>
          <td>{{ Form::time('coma_1', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>2</td>
          <td>{{ Form::time('coma_2', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>3</td>
          <td>{{ Form::time('coma_3', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>4</td>
          <td>{{ Form::time('coma_4', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>5</td>
          <td>{{ Form::time('coma_5', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>6</td>
          <td>{{ Form::time('coma_6', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>7</td>
          <td>{{ Form::time('coma_7', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>8</td>
          <td>{{ Form::time('coma_8', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>9</td>
          <td>{{ Form::time('coma_9', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>10</td>
          <td>{{ Form::time('coma_10', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
      </table>
    </div>
    <button type="button" value="登録" class="btn btn-primary" onclick="submitSchedule()">登録</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
