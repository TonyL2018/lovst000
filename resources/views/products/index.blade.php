@extends('layouts.leftnav')

@section('title', '| Products')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1> 商品一覧</h1>
    <!-- a href=" route('roles.index') " class="btn btn-default pull-right">Roles</a -->
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品名</th>
                    <th>サイズ</th>
                    <th>価格適用期間</th>
                    <th>価格</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle">{{ $product->product_id }}</td>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle">{{ $product->name }}</td>
                    <td rowspan="{{$product->prices->count() > 0 ? $product->prices->count() : 1}}" style="vertical-align: middle">{{$product->kana}}</td>
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
    {{$products->links()}}
    <br>&nbsp;
    <button type='button' class="btn btn-warning" onclick="javascript:history.go(-1)">戻る</button>
</div>

@endsection
