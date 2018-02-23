<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Honnbu;

use Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(isset(Auth::user()->fc_id)){
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->get();
      }
      else {
        $honnbus = Honnbu::all();
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
      if(isset(Auth::user()->fc_id))
      {
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->get();
      }
      else {
        $honnbus = Honnbu::all();
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
      $this->validate($request, [
          'name'=>'required|max:120',
          'address'=>'required|max:120',
          'detail'=>'required|max:120',
          'fc_id'=>'required'
      ]);

      $shop = Shop::create($request->only('name', 'address', 'detail', 'fc_id'));

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
}
