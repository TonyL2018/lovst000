<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Shop;
use App\Honnbu;
use App\Holiday;

use Auth;

class ShopController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'checkRole:設定^店舗管理']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(isset(Auth::user()->fc_id) && Auth::user()->fc_id > 0){
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
      }
      else {
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
      }
      return view('shops.index', compact('honnbus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(isset(Auth::user()->fc_id) && Auth::user()->fc_id > 0)
      {
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
      }
      else {
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
      }
      return view('shops.create')->with('honnbus', $honnbus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validateInput($request);

      $shop = Shop::create($request->only('name', 'address', 'route', 'detail', 'fc_id', 'telephone', 'email', 'post'));

      $shops = Shop::where('fc_id', $request['fc_id']);

      $num = $shops->count();
      if($num < 10)
      {
        $shop->shop_id = str_replace('FC', 'SH', $shop->honnbu->fc_id).'0'.$num;
      }
      else {
        $shop->shop_id = str_replace('FC', 'SH', $shop->honnbu->fc_id).$num;
      }
      $shop->save();

      if(is_numeric($request['weeks1']) && is_numeric($request['day_week1']))
      {
        $holiday = new Holiday();
        $holiday->shop_id = $shop->id;
        $holiday->day_week = $request['day_week1'];
        $holiday->weeks = $request['weeks1'];
        $holiday->delete_flg = 0;
        $holiday->save();
      }

      if(is_numeric($request['weeks2']) && is_numeric($request['day_week2']))
      {
        $holiday = new Holiday();
        $holiday->shop_id = $shop->id;
        $holiday->day_week = $request['day_week2'];
        $holiday->weeks = $request['weeks2'];
        $holiday->delete_flg = 0;
        $holiday->save();
      }
      return redirect()->route('shops.index')
          ->with('flash_message',
           '店舗が追加されました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $shop = Shop::findOrFail($id);
      $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();

      return view('shops.show', compact('shop', 'honnbus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();

        return view('shops.edit', compact('shop', 'honnbus'));
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
      $shop = Shop::findOrFail($id);
      $this->validateInput($request);

      $shop->fill($request->only(['name', 'address', 'route', 'detail', 'fc_id', 'telephone', 'email', 'post']))->save();

      foreach ($shop->holidays as $holiday) {
        $holiday->delete();
      }

      if(is_numeric($request['weeks1']) && is_numeric($request['day_week1']))
      {
        $holiday = new Holiday();
        $holiday->shop_id = $shop->id;
        $holiday->day_week = $request['day_week1'];
        $holiday->weeks = $request['weeks1'];
        $holiday->delete_flg = 0;
        $holiday->save();
      }

      if(is_numeric($request['weeks2']) && is_numeric($request['day_week2']))
      {
        $holiday = new Holiday();
        $holiday->shop_id = $shop->id;
        $holiday->day_week = $request['day_week2'];
        $holiday->weeks = $request['weeks2'];
        $holiday->delete_flg = 0;
        $holiday->save();
      }

      return redirect()->route('shops.index')
          ->with('flash_message',
           '店舗は正常に編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        foreach ($shop->studios as $studio) {
          $studio->delete_flg = 1;
          $studio->save();
        }
        $shop->delete_flg = 1;
        $shop->save();

        return redirect()->route('shops.index')
          ->with('flash_message',
          '店舗が停止されました。');
    }

    protected function validateInput(Request $request)
    {
      $this->validate($request, [
          'name'=>'required|max:120',
          'address'=>'required|max:120',
          'route' => 'required|max:500',
          'detail'=>'required|max:120',
          'fc_id'=>'required',
          'telephone'=>'required|min:10000000|numeric',
          'email' => 'required|max:50',
          'post' => 'bail|required|min:1000000|numeric'
      ]);
    }

    public function list($id)
    {
      $response;
      if(isset($id))
      {
        $shops = Shop::where('fc_id', $id)->where('delete_flg', '!=', 1)->get();
        foreach ($shops as $shop) {
          $response = '?'.$shop->id.'|'.$shop->name.'|';
        }
        return $response;
      }
    }
}
