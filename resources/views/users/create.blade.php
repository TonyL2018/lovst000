{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.leftnav')

@section('title', '| Add User')

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
    stores = document.getElementById('store_id');
    length = stores.length;
    for(j=length;j>0;j--)
    {
      stores.remove(j);
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

    <h1><i class='fa fa-user-plus'></i> アカウント登録</h1>
    <hr>

    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('name', '表示名') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name_kanji', '姓漢字') }}
        {{ Form::text('last_name_kanji', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kanji', '名漢字') }}
        {{ Form::text('first_name_kanji', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name_kana', '姓カナ') }}
        {{ Form::text('last_name_kana', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('first_name_kana', '名カナ') }}
        {{ Form::text('first_name_kana', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
      {{ Form::label('roles[]', '権限種別') }}<br>
      <select name="roles[]" holdplace='権限種別を選択'>
        <option></option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('fc_id', '所属')}}<br>
      <select name="fc_id" onchange="showShops(this.value)">
        <option></option>
        <option value='-1'>LOVSTホールディングス</option>
        <option value='-2'>LOVST事務所</option>
        @foreach ($honnbus as $honnbu)
            <option value="{{$honnbu->id}}">{{$honnbu->name}}</option>
        @endforeach
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('store_id', '所属店舗')}}<br>
      <select name="store_id" id='store_id'>
        <option></option>
      </select>
    </div>
    <div class='form-group'>
      {{Form::label('', 'スタッフ種別')}}<br>
      @foreach($occupations as $occupation)
      <input type='checkbox' value='{{ $occupation->id }}' name='occupations[]' />{{ $occupation->name }}&nbsp;
      @endforeach
    </div>
    <div class="form-group">
      {{ Form::label('remarks', '備考') }}
      {{ Form::textarea('remarks', '', array('class' => 'form-control', 'rows' => '3')) }}

    </div>
    <div class="form-group">
        {{ Form::label('password', 'パスワード') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'パスワード再入力') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('登録', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    <br>
    {{ Form::close() }}

</div>

@endsection
