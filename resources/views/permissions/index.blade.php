{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.leftnav')

@section('title', '| Permissions')

@section('content')

<div class="page-body">
  {!! Form::open(['method' => 'PUT', 'route' => ['permissions.update', '0'] ]) !!}
    <h1><i class="fa fa-key"></i>権限管理

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">アカウント</a>
    <!--a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a></h1 -->
    <hr>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="well with-header">
          <div class="header ">

          </div>
        <table class="table table-bordered table-hover text-align-center">
            <thead>
                <tr>
                    <th>機能</th>
                    <th>項目</th>
                    <th>LOVSTホールディングス</th>
                    <th>LOVST事務所</th>
                    <th>FC本部</th>
                    <th>店舗マネージャー</th>
                    <th>店舗スタッフ</th>
                </tr>
            </thead>
            <tbody valign="middle">
                @php
                    $str=""; $i=0; $role_tmp; $label_yes; $label_no;
                @endphp
                @foreach ($permissions as $permission)
                <tr style="font-size:11px;">
                  @if($str!==substr($permission->name, 0, strpos($permission->name, '^')))
                    @php
                    $str=substr($permission->name, 0, strpos($permission->name, '^'))
                    @endphp
                    @foreach ($permissions as $permission0)
                      @if($str===substr($permission0->name, 0, strpos($permission0->name, '^')))
                        @php
                          $i++;
                        @endphp
                      @endif
                    @endforeach
                    <td rowspan="{{$i}}" style="vertical-align: middle">{{ substr($permission->name, 0, strpos($permission->name, '^')) }}</td>
                    @php
                      $i=0;
                    @endphp
                  @endif
                    <td style="vertical-align: middle">{{ substr($permission->name, strpos($permission->name, '^')+1) }}</td>
                    @php
                    for ($x=1; $x<=5; $x++) {
                      foreach($roles as $role){
                          if ($x===1 && $role->name === "LOVSTホールディングス"){
                            $role_tmp=$role;
                            break;
                          }
                          elseif ($x===2 && $role->name === "LOVST事務所"){
                            $role_tmp=$role;
                            break;
                          }
                          elseif ($x===3 && $role->name === "FC本部"){
                            $role_tmp=$role;
                            break;
                          }
                          elseif ($x===4 && $role->name === "店舗マネージャー"){
                            $role_tmp=$role;
                            break;
                          }
                          elseif ($x===5 && $role->name === "店舗スタッフ"){
                            $role_tmp=$role;
                            break;
                          }
                      }
                      $label_no="権限なし";
                      if($permission->name==="予約内容^緊急お知らせ送信" || $permission->name==="設定^フランチャイズ管理" || $permission->name==="設定^店舗管理" || $permission->name==="設定^スタジオ管理" || $permission->name==="設定^アカウント管理" || $permission->name==="設定^プラン作成・編集" || $permission->name==="設定^メールテンプレート作成・編集" || $permission->name==="設定^スタッフ種別の登録・編集"){
                        $label_yes="操作可";
                      }
                      elseif($permission->name==="顧客管理^顧客連絡先"){
                        $label_yes="表示"; $label_no="非表示";
                      }
                      elseif($permission->name==="設定^商品一覧"){
                        $label_yes="閲覧可";
                      }
                      else{
                        if($x<=2){
                          $label_yes="全店分";
                        }
                        else{
                          $label_yes="管轄分";
                        }
                      }
                    @endphp
                    <td style="text-align:left; vertical-align: middle">
                      @if($role_tmp->hasPermissionTo($permission->name))
                      <input name="permission{{$role_tmp->id}}{{$permission->id}}" type="radio" value=" {{$permission->id}} " checked>
                      {{ Form::label($label_yes, ucfirst($label_yes)) }}
                      <input name="permission{{$role_tmp->id}}{{$permission->id}}" type="radio" value="0">
                      {{ Form::label($label_no, ucfirst($label_no)) }}
                      @else
                      <input name="permission{{$role_tmp->id}}{{$permission->id}}" type="radio" value=" {{$permission->id}} ">
                      {{ Form::label($label_yes, ucfirst($label_yes)) }}
                      <input name="permission{{$role_tmp->id}}{{$permission->id}}" type="radio" value="0" checked>
                      {{ Form::label($label_no, ucfirst($label_no)) }}
                      @endif
                    </td>
                    @php
                    }
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ Form::submit('保存', array('class' => 'index-button')) }}
      </div>
    </div>
  </div>

  {!! Form::close() !!}
</div>
@endsection
