<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Price;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'checkRole:設定^商品一覧']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cnt = 10, $col = 1, $row = 0)
    {
      if($col == 1)
      {
        $products = Product::orderBy('productId', 'asc')->paginate($cnt);
      }
      elseif($col == 2)
      {
        $products = Product::orderBy('productId', 'desc')->paginate($cnt);
      }
      else {
        $products = Product::orderBy('productId', 'desc')->paginate($cnt);
      }
      return view('products.index', compact('products', 'cnt', 'col', 'row'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->updateProduct();
      //$this->updatePrice();
      return redirect()->route('products.list', [30, 1])->with('flash_message', '商品がインポートされました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function importData($tableName)
    {
      // create curl resource
      $curl = curl_init();

      $data=array(
       "proc_name" => "product_ref",
       "params" => "{ \"table_name\":\"".$tableName."\" }"
      );

      $header=array('x_contract_id:spg186k4', 'x_access_token:89cc174682a3e4d7c98cb0dd9d8d91b0', 'Content-Type: application/x-www-form-urlencoded');

      // set url
      curl_setopt($curl, CURLOPT_URL, "https://webapi.smaregi.jp/access/");

      curl_setopt($curl, CURLOPT_POST, 1);

      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

      curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
      // curl_setopt($curl, CURLOPT_POSTFIELDS , $data);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, null, '&'));
      // curl_setopt($curl, CURLOPT_POSTFIELDS , json_encode($data));

      //return the transfer as a string
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      // $output contains the output string
      $output = curl_exec($curl);

      // close curl resource to free up system resources
      curl_close($curl);
      // var_dump(json_decode($output));

      return $output;
    }

    protected function updateProduct()
    {
      $id = Product::max('id');
      $output = $this->importData('Product');
      $goods = json_decode($output);
      $results = $goods->result;
      // $cnt = $goods->total_count;
      foreach ($results as $good) {
        Product::create([
          'productId' => $good->productId,
          'categoryId' => $good->categoryId,
          'productCode' => $good->productCode,
          'productName' => $good->productName,
          'productKana' => '',
          'price' => $good->price,
          'size' => $good->size,
        ]);
      }
      Product::where('id', '<=', $id)->delete();
    }

    protected function updatePrice()
    {
      $id = Price::max('id');
      $output = $this->importData('ProductPrice');
      $goods = json_decode($output);
      $results = $goods->result;
      // $cnt = $goods->total_count;
      foreach ($results as $good) {
        if($good->priceDivision == 1)
        {
          Price::create([
            'product_id' => $good->productId,
            'price' => $good->price,
            'start_date' => $good->startDate,
            'end_date' => $good->endDate,
          ]);
        }
      }
      Price::where('id', '<=', $id)->delete();
    }
}
