@extends('layouts.leftnav')

@section('title', '| Add Course')

@section('content')
<script>
var x=1;
function addQuestion(){
  x++;
  document.getElementById('x').value = x;
  var _table = document.getElementById("table");
  var _row;
  var _cell;
  _row = document.createElement("tr");
  _row.style = 'height:40px;';
  _table.appendChild(_row);
  _cell = document.createElement("td");
  _cell.innerText  = "質問"+x;
  _row.appendChild(_cell);
  _cell = document.createElement("td");
  _cell.innerHTML = "<input type='text' style='width:90%;height:30px;padding:5px;' name='question_name"+x+"' id='question_name"+x+"'>";
  _row.appendChild(_cell);
  _cell = document.createElement("td");
  _cell.innerHTML = "<input type='button' class='btn btn-danger' onclick='delQuestion(this)' value='-'>";
  _row.appendChild(_cell);
}
function delQuestion(row){
  var _table = document.getElementById("table");
  var i = row.parentNode.parentNode.rowIndex;
  _table.deleteRow(i);
}
</script>
<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-user-plus'></i> 撮影内容作成：設問</h1>
    <hr>
    {{ Form::open(array('url' => 'courses')) }}
    {{Form::hidden('x', '', array('id' => 'x'))}}
    <div class='form-group'>
      {{Form::label('name', '撮影内容名')}}
      <br>
      {{Form::text('name', '', array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
      <table class="table table-hover text-align-center" id="table">
        <tr>
          <th style='width:25%'></th>
          <th style='width:55%'>質問</th>
          <th></th>
        </tr>
        <tr style="height:40px;">
          <td>質問1</td>
          <td><input type='text' style='width:90%;height:30px;padding:5px;' name='question_name1' id='question_name1'></td>
          <td><input type='button' class='btn btn-danger' onclick='delQuestion(this)' value='-'></td>
        </tr>
      </table>
      <table class="table table-hover text-align-center">
        <tr>
          <td colspan="3" style="text-align:left;">
            <input type="button" class="btn btn-primary" onclick="addQuestion()" value="+"/>
          </td>
        </tr>
      </table>
    </div>
    <br>
    {{ Form::submit('作成', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
    <br>
<hr>
</div>

@endsection
