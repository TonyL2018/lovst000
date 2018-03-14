@extends('layouts.leftnav')

@section('title', '| Edit Schedule')

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
function showStudios(str)
{
    if (str=="")
    {
        return;
    }
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            stores = document.getElementById('studio_id');
            length = stores.length;
            for(j=length;j>0;j--)
            {
              stores.remove(j);
            }
            studios = xmlhttp.responseText.split('?');
            for(i=1;i<studios.length;i++)
            {
              items = studios[i].split('|');
              if(items.length > 0)
              {
                var y=document.createElement('option');
                y.value = items[0];
                y.text = items[1];
                try
                {
                  stores.add(y,null);
                }
                catch(ex)
                {
                  stores.add(y);
                }
              }
            }
        }
    }
    xmlhttp.open("GET","{{url('/studios/list/')}}/"+str,true);
    xmlhttp.send();
}
</script>
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 予約枠編集</h1>
    <hr>

    {{ Form::model($schedule, array('route' => array('schedules.update', $schedule->id), 'method' => 'PUT')) }}
    {{ Form::hidden('status', 'submit', array('id' => 'status')) }}
    <div class='form-group'>
      {{Form::label('store_id', '店舗名')}}
      <br>
      <select name="store_id" id='store_id' onchange="showStudios(this.value)">
        <option value='{{ $schedule->studio->shop->id }}'>{{ $schedule->studio->shop->name }}</option>
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('studio_id', 'スタジオ名')}}
      <br>
      <select name="studio_id" id='studio_id'>
        <option value='{{ $schedule->studio->id }}'>{{ $schedule->studio->name }}</option>
      </select>
    </div>
    <div class="form-group">
        {{ Form::label('', '適用期間') }}
        <table class="table table-hover text-align-center">
          <tr>
            <td>{{ Form::date('start_date', null, array('class' => 'form-control')) }}</td>
            <td>～</td>
            <td>{{ Form::date('end_date', null, array('class' => 'form-control')) }}</td>
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
          <td>{{ Form::time('coma_1', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>2</td>
          <td>{{ Form::time('coma_2', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>3</td>
          <td>{{ Form::time('coma_3', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>4</td>
          <td>{{ Form::time('coma_4', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>5</td>
          <td>{{ Form::time('coma_5', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>6</td>
          <td>{{ Form::time('coma_6', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>7</td>
          <td>{{ Form::time('coma_7', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>8</td>
          <td>{{ Form::time('coma_8', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>9</td>
          <td>{{ Form::time('coma_9', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>10</td>
          <td>{{ Form::time('coma_10', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>11</td>
          <td>{{ Form::time('coma_11', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>12</td>
          <td>{{ Form::time('coma_12', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>13</td>
          <td>{{ Form::time('coma_13', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>14</td>
          <td>{{ Form::time('coma_14', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>15</td>
          <td>{{ Form::time('coma_15', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>16</td>
          <td>{{ Form::time('coma_16', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>17</td>
          <td>{{ Form::time('coma_17', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>18</td>
          <td>{{ Form::time('coma_18', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>19</td>
          <td>{{ Form::time('coma_19', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>20</td>
          <td>{{ Form::time('coma_20', null, array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
      </table>
    </div>
    {!! Form::submit('保存', ['class' => 'btn btn-danger']) !!}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
<hr>
</div>
@endsection
