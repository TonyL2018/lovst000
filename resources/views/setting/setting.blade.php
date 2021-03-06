@extends('layouts.leftnav')

@section('title', '| Permissions')

@section('content')

<div class="page-body">
  <h1>
    ・設定
    <hr>
  </h1>
  <!--a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a></h1 -->
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="well with-header">
  <table class="table table-hover text-align-center">
      @hasanyrole('LOVSTホールディングス|LOVST事務所|FC本部|店舗マネージャー')
      <thead>
          <tr>
              <th colspan="2" style="text-align:left; vertical-align: middle">●メイン管理</th>
          </tr>
      </thead>
      @endhasanyrole
      @hasanyrole('LOVSTホールディングス|LOVST事務所')
      <tbody valign="middle">
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^フランチャイズ管理')<a href="{{ route('honnbus.index') }}">フランチャイズ管理</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle">@can('設定^アカウント管理')<a href="{{ route('users.index') }}">アカウント/スタッフ登録・編集</a>@endcan</td>
          </tr>
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^店舗管理')<a href="{{ route('shops.index') }}">店舗管理</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle">@can('設定^アカウント管理')<a href="{{ route('permissions.index') }}">アカウントの権限設定</a>@endcan</td>
          </tr>
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^スタジオ管理')<a href="{{ route('studios.index') }}">スタジオ管理</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle"></td>
          </tr>
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^予約枠作成・編集')<a href="{{ route('schedules.index') }}">予約枠作成・編集</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle"></td>
          </tr>
      </tbody>
      @endhasanyrole
      @hasanyrole('FC本部|店舗マネージャー')
      <tbody valign="middle">
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^スタジオ管理')<a href="{{ route('studios.index') }}">スタジオ管理</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle">@can('設定^アカウント管理')<a href="{{ route('users.index') }}">アカウント/スタッフ登録・編集</a>@endcan</td>
          </tr>
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^予約枠作成・編集')<a href="{{ route('schedules.index') }}">予約枠作成・編集</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle"></td>
          </tr>
      </tbody>
      @endhasanyrole
      @hasanyrole('LOVSTホールディングス|LOVST事務所|FC本部|店舗マネージャー')
      <thead>
          <tr>
              <th colspan="2" style="text-align:left; vertical-align: middle">●編集メニュー</th>
          </tr>
      </thead>
      <tbody valign="middle">
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^撮影内容作成・編集')<a href="{{ route('courses.index') }}">撮影内容作成・編集</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle">@can('設定^メールテンプレート作成・編集')<a href="{{ route('templates.index') }}">メールテンプレート作成・編集</a>@endcan</td>
          </tr>
      </tbody>
      @endhasanyrole
      <thead>
          <tr>
              <th colspan="2" style="text-align:left; vertical-align: middle">●その他</th>
          </tr>
      </thead>
      @hasanyrole('LOVSTホールディングス|LOVST事務所')
      <tbody valign="middle">
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^商品一覧')<a href='{{ route('products.list', [30, 1]) }}'>商品一覧</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle">@can('設定^スタッフ種別の登録・編集')<a href='{{ route('occupations.index') }}'>スタッフ種別の登録・編集</a>@endcan</td>
          </tr>
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle"><a href='{{ route('passwords.index') }}'>パスワード変更</a></td>
              <td style="text-align:left; vertical-align: middle"></td>
          </tr>
      </tbody>
      @else
      <tbody valign="middle">
          <tr style="font-size:11px;">
              <td style="text-align:left; vertical-align: middle">@can('設定^商品一覧')<a href='{{ route('products.list', [30, 1]) }}'>商品一覧</a>@endcan</td>
              <td style="text-align:left; vertical-align: middle"><a href='{{ route('passwords.index') }}'>パスワード変更</a></td>
          </tr>
      </tbody>
      @endhasanyrole
  </table>
  </div>
  </div>
  </div>
</div>
@endsection
