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
function showStudios(str)
{
    if (str=="")
    {
        return;
    }
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            //alert(xmlhttp.responseText);
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
                  stores.add(y,null); // standards compliant
                }
                catch(ex)
                {
                  stores.add(y); // IE only
                }
              }
            }
            //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","/studios/list/"+str,true);
    xmlhttp.send();
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
      <select name="store_id" id='store_id' onchange="showStudios(this.value)">
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
      <select name="studio_id" id='studio_id'>
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
        <tr>
          <td>11</td>
          <td>{{ Form::time('coma_11', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>12</td>
          <td>{{ Form::time('coma_12', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>13</td>
          <td>{{ Form::time('coma_13', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>14</td>
          <td>{{ Form::time('coma_14', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>15</td>
          <td>{{ Form::time('coma_15', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>16</td>
          <td>{{ Form::time('coma_16', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>17</td>
          <td>{{ Form::time('coma_17', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>18</td>
          <td>{{ Form::time('coma_18', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>19</td>
          <td>{{ Form::time('coma_19', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
        <tr>
          <td>20</td>
          <td>{{ Form::time('coma_20', '', array('class' => 'form-control')) }}</td>
          <td>～</td>
        </tr>
      </table>
    </div>
    <button type="button" value="登録" class="btn btn-primary" onclick="submitSchedule()">登録</button>

    {{ Form::close() }}
<hr>
</div>

@endsection
