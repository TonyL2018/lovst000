@extends('layouts.leftnav')

@section('title', '| Products')

@section('content')
<script>
function listProducts1(cnt)
{
  location.href = '{{url('/products/list')}}/' + cnt + '/{{$col}}';
}
function listProducts2(cnt)
{
  if(cnt == document.getElementById('col').value)
  {
    cnt++;
  }
  location.href = '{{url('/products/list')}}/' + document.getElementById('cnt').value + '/' + cnt;
}
</script>
<input type='hidden' id='col' value='{{$col}}'/>
<div class="col-lg-10 col-lg-offset-1">
    <h1> 商品一覧</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <table class="table table-hover">
      <tr>
        <td>{{$products->links()}}</td>
        <td style='text-align:right'>
          <select onchange="listProducts1(this.value)" id='cnt'>
            <option value='30' @if($cnt == 30) selected @endif>30件</option>
            <option value='60' @if($cnt == 60) selected @endif>60件</option>
            <option value='100' @if($cnt == 100) selected @endif>100件</option>
            <option value='200' @if($cnt == 200) selected @endif>200件</option>
            <option value='300' @if($cnt == 300) selected @endif>300件</option>
          </select>
        </td>
      </tr>
    </table>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th><a onclick="listProducts2(1)" style="cursor:pointer">商品ID</a>@if($col == 1)↑@endif @if($col == 2)↓@endif / 商品コード / 商品名</th>
                    <th>商品単価</th>
                    <th>原価</th>
                    <th>端末表示</th>
                    <th>表示順</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle">{{ $product->productId }} - {{ $product->productCode }}<br>{{ $product->productName }}</td>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle">￥{{number_format($product->price)}}<br>税込</td>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle"></td>
                    @if($product->prices->count() > 0)
                      @foreach ($product->prices as $price)
                        @if($loop->index > 0)
                    </tr><tr>
                        @endif
                      <td>{{ $price->start_date }}~{{ $price->end_date }}</td>
                      <td>
                          ¥{{ $price->price }}
                      </td>
                      @endforeach
                    @else
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <br>
    {{ Form::open(array('url' => 'products')) }}
    {{ Form::submit('インポート', array('class' => 'btn btn-primary')) }}&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
    {{ Form::close() }}
    <br>&nbsp;
</div>

@endsection
