{{-- \resources\views\users\edit.blade.php --}}

@extends('layouts.leftnav')

@section('title', '| Edit User')

@section('content')
<script>
function changeHonnbu()
{
   document.getElementById("status").value = 'select';
   document.getElementById("addUser").submit();
}
function submitHonnbu()
{
  document.getElementById("status").value = 'submit';
  document.getElementById("addUser").submit();
}
function showShops(str)
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
    {
      stores = document.getElementById('store_id');
      length = stores.length;
      for(j=length;j>0;j--)
      {
        stores.remove(j);
      }
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            stores = document.getElementById('store_id');
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
    xmlhttp.open("GET","{{url('/shops/list/')}}/"+str,true);
    xmlhttp.send();
}
</script>
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> 編集 {{$user->name}}</h1>
    <hr>

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('staff_id', 'アカウントID(スタッフID)') }}
        {{ Form::text('staff_id', null, array('class' => 'form-control', 'readonly')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', '表示名') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('last_name_kanji', '姓漢字') }}
        {{ Form::text('last_name_kanji', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kanji', '名漢字') }}
        {{ Form::text('first_name_kanji', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name_kana', '姓カナ') }}
        {{ Form::text('last_name_kana', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kana', '名カナ') }}
        {{ Form::text('first_name_kana', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{Form::label('roles[]', '権限種別')}}
      <br>
      <select name="roles[]">
        <option></option>
        @foreach ($roles as $role)
            @if($user->hasRole($role->name))
            <option value="{{$role->id}}" selected>{{$role->name}}</option>
            @else
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endif

        @endforeach
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('fc_id', '所属')}}<br>
      <select name="fc_id" onchange="showShops(this.value)">
        @if($user->fc_id == -1)
        <option value='-1' selected>LOVSTホールディングス</option>
        @endif
        @if($user->fc_id == -2)
        <option value='-2' selected>LOVST事務所</option>
        @endif
        @if($user->fc_id > 0)
        <option value="{{$user->honnbu->id}}" selected>{{$user->honnbu->name}}</option>
        @endif
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('store_id', '所属店舗')}}<br>
      <select name="store_id" id='store_id'>
        @if(isset($user->store_id))
          <option value="{{$user->shop->id}}" selected>{{$user->shop->name}}</option>
        @else
          <option></option>
        @endif
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('', 'スタッフ種別')}}<br>
      @foreach($occupations as $occupation)
      <input type='checkbox' value='{{ $occupation->id }}' name='occupations[]' @foreach($user->_occupations as $occupation_) @if($occupation_->occupation_id == $occupation->id) checked @endif @endforeach />{{ $occupation->name }}&nbsp;
      @endforeach
    </div>
    <div class="form-group">
      {{ Form::label('remarks', '備考') }}
      {{ Form::textarea('remarks', null, array('class' => 'form-control', 'rows' => '3')) }}

    </div>
    <div class="form-group">
        {{ Form::label('password', 'パスワード') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'パスワード再入力') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('保存', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    <br>
    {{ Form::close() }}

</div>
<div style=" width:80%; margin:10px 10%;  height:10px; background:#f3f3f3;"></div>
@endsection
