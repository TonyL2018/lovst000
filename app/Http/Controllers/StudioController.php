<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Shop;

use Auth;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->store_id)){
          $shops = Shop::where('id', '=', Auth::user()->store_id)->get();
        }
        elseif(isset(Auth::user()->fc_id)){
          $shops = Shop::where('fc_id', '=', Auth::user()->fc_id)->get();
        }
        else{
          $shops = Shop::all();
        }

        return view("studios.index")->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(isset(Auth::user()->store_id)){
        $shops = Shop::where('id', '=', Auth::user()->store_id)->get();
      }
      elseif(isset(Auth::user()->fc_id)){
        $shops = Shop::where('fc_id', '=', Auth::user()->fc_id)->get();
      }
      else{
        $shops = Shop::all();
      }

      return view("studios.create")->with('shops', $shops);
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
          'detail'=>'required|max:120',
          'store_id'=>'required'
      ]);

      $studio = Studio::create($request->only('name', 'detail', 'store_id'));

      return redirect()->route('studios.index')
          ->with('flash_message',
           'スタジオが追加されました。');
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
