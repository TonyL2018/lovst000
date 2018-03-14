<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--Basic Styles-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="{{ asset('css/beyond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/typicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
	  <link href="{{ asset('css/myadd/newcss.css') }}" rel="stylesheet" type="text/css" />
    <!--  弹出框显示  -->
    <link href="{{ asset('css/myadd/zeroModal.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('js/myadd/jquery.min.1.11.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/myadd/zeroModal.js') }}"></script>
    <style>
    .main-container{
		margin-top:-18px;
	}
    </style>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" >
              <ul class="nav sidebar-menu">
              	<!--lefy logo -->
              	<li class="active">
              		<a style=" text-align:center; margin-top:30px;"><img src="{{ asset('img/myadd/logo.png') }}"></a>
              		<a style=" text-align:center; margin-top:30px; width:217px;"><span class="admin">{{Auth::user() -> name}}</span></a>
                  @if(isset(Auth::user() -> fc_id))
                  <a href="javascript:void(0);" style=" text-align:center; width:217px; font-size:20px;"><span class="left-name">@if(Auth::user()->fc_id == -1) LOVSTホールディングス @elseif(Auth::user()->fc_id == -2) LOVST事務所 @else {{Auth::user() -> honnbu -> name}} @endif</span></a>
                  @endif
                  <a href="javascript:void(0);" style=" text-align:center; width:217px"><span class="left-name">{{Auth::user()->getRoleNames()->first()}}({{Auth::user() -> name}})</span></a>
              		<a><div style=" width:80%; margin-top:30px; margin-left:10%; height:1px; background:#9a9a9a;"></div></a>
              	</li>
              	<!-- leftnav -->
                @can('TOPページ^カレンダー表示')
              	<li>
              		<a href="LS002_01.html">
              			<span class="menu-text nav-first">TOP</span>
              		</a>
              	</li>
                @endcan
                @can('緊急お知らせ^一覧表示')
              	<li>
              		<a href="LS003_01.html">
              			<span class="menu-text ">緊急通知一覧</span>
              		</a>
              	</li>
                @endcan
                @can("お知らせ^一覧表示")
              	<li>
              		<a>
              			<span class="menu-text ">お知らせ一覧</span>
              		</a>
              	</li>
                @endcan
              	<li>
              		<a>
              			<span class="menu-text">撮影予約更新履歴</span>
              		</a>
              	</li>
              	<li>
              		<a>
              			<span class="menu-text">お客様による予約変更履歴</span>
              		</a>
              	</li>

                <li>
              		<a>
              			<div style=" width:80%; margin:10px 10%; height:1px; background:#f3f3f3;"></div>
              		</a>
              	</li>
                @php
                if(Auth::user()->hasAnyPermission(['予約管理^検索条件範囲', '予約管理^一覧表示'])){
                @endphp
              	<li>
              		<a>
              			<span class="menu-text">予約管理</span>
              		</a>
              	</li>
                @php
                }
                @endphp
              	<li>
              		<a>
              			<span class="menu-text">一斉メール送信</span>
              		</a>
              	</li>
                @can("売上管理|売上・統計表示")
              	<li>
              		<a>
              			<span class="menu-text">売上管理</span>
              		</a>
              	</li>
                @endcan
                @php
                if(Auth::user()->hasAnyPermission(['顧客管理^検索条件範囲', '顧客管理^一覧表示', '顧客管理^顧客連絡先'])){
                @endphp
              	<li>
              		<a>
              			<span class="menu-text">顧客管理</span>
              		</a>
              	</li>
                @php
                }
                @endphp
              	<li>
              		<a>
              			<span class="menu-text">写真管理</span>
              		</a>
              	</li>
                @php
                if(Auth::user()->hasAnyPermission(['商品管理^検索条件範囲', '商品管理^一覧表示', '商品管理^注文取り消し', '商品管理^詳細記入・データ選択・入金確認', '商品管理^編集・発注・完成受取・納品発送'])){
                @endphp
              	<li>
              		<a href="LS008_01.html">
              			<span class="menu-text">商品管理</span>
              		</a>
              	</li>
                @php
                }
                @endphp
                @can('シフト管理^シフト作成')
              	<li>
              		<a href="LS008_01.html">
              			<span class="menu-text">シフト管理</span>
              		</a>
              	</li>
                @endcan
              	<li>
              		<a>
              			<div style=" width:80%; margin:10px 10%;  height:1px; background:#f3f3f3;"></div>
              		</a>
              	</li>
                @php
                if(Auth::user()->hasAnyPermission(['設定^フランチャイズ管理', '設定^店舗管理', '設定^スタジオ管理', '設定^アカウント管理', '設定^撮影内容作成・編集', '設定^メールテンプレート作成・編集', '設定^予約枠作成・編集', '設定^スタッフリスト管理', '設定^スタッフ種別の登録・編集', '設定^商品一覧'])){
                @endphp
              	<li>
              		<a href="{{ route('setting') }}">
              			<span class="menu-text">設定</span>
              		</a>
              	</li>
                @php
                }
                @endphp
                <li>
              		<a>
              			<div style=" width:80%; margin:10px 10%;  height:1px; background:#f3f3f3;"></div>
              		</a>
              	</li>
              </ul>
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
              <div class="right-top">
                  <div style=" width:80%; margin:10px 10%;  height:0px; background:#f3f3f3;"></div>
                  <ul class="breadcrumb">
                      <li>
                          <i class="fa fa-home"></i>
                          LOVST 本部
                      </li>
                  </ul>
                  <div class="right">
                    <span class=" top-right-icon"><a href=""><img src="{{ asset('img/myadd/1.png')}}"><span></span></a></span>
                      <span class=" top-right-icon"><a href=""><img src="{{ asset('img/myadd/2.png')}}"><span></span></a></span>
                      <span class=" top-right-icon"><a href=""><img src="{{ asset('img/myadd/3.png')}}"></a></span>
                      <span class=" top-right-icon"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">ログアウト</a></span>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </div>
              </div>
              @if(Session::has('flash_message'))
                  <div class="container">
                      <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                      </div>
                  </div>
              @endif

              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      @include ('errors.list') {{-- Including error file --}}
                  </div>
              </div>

              @yield('content')
            </div>
            <!-- /Page Content -->
        </div>

        <!-- /Page Container -->
    <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="{{ asset('js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!--Beyond Scripts-->
    <script src="{{ asset('js/beyond.min.js') }}"></script>
    <!-- script>
	function LS002_04_01() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_04_01.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }
    function LS002_03_02() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_02.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }
	function LS002_03_03() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_03.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }
	function LS002_03_04() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_04.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }
	function LS002_03_05() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_05.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }

	function LS002_03_06() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_06.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }

	function LS002_03_07() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_07.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }
	function LS002_03_08() {
        zeroModal.show({
            title: '',
            iframe: true,
            url: 'LS002_03_08.html',
            width: '70%',
            height: '96%',
            cancel: false,
			forbidBodyScroll: false,
        });
    }

  </script -->




</body>
<!--  /Body -->
</html>
