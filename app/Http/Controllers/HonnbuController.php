<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Honnbu;
use App\Shop;

use Auth;

class HonnbuController extends Controller
{

    public function _construct(){
      $this->middleware(['auth', 'checkRole:設定^フランチャイズ管理']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(isset(Auth::user()->fc_id))
      {
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->get();
      }
      else {
        $honnbus = Honnbu::all();
      }
      return view('honnbus.index', compact('honnbus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('honnbus.create');
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
          'start_date'=>'required|date',
          'corporation'=>'required|max:120',
          'representative'=>'required|max:120',
          'capital'=>'required|max:120',
          'tele_kaisya'=>'required|max:120',
          'tele_kojin'=>'required|max:120',
          'adress'=>'required|max:120',
          'detail'=>'required|max:120'
      ]);

      $honnbu = Honnbu::create($request->only('name', 'start_date', 'corporation', 'representative', 'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail'));

      return redirect()->route('honnbus.index')
          ->with('flash_message',
           'フランチャイズが追加されました。');
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
        $honnbu = Honnbu::findOrFail($id);
        return view('honnbus.edit')->with('honnbu', $honnbu);
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
        $honnbu = Honnbu::findOrFail($id);
        $this->validate($request, [
          'name'=>'required|max:120',
          'start_date'=>'required|date',
          'corporation'=>'required|max:120',
          'representative'=>'required|max:120',
          'capital'=>'required|max:120',
          'tele_kaisya'=>'required|max:120',
          'tele_kojin'=>'required|max:120',
          'adress'=>'required|max:120',
          'detail'=>'required|max:120'
        ]);
        $input = $request->only('name', 'start_date', 'corporation', 'representative', 'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail');
        $honnbu->fill($input)->save();
        return redirect()->route('honnbus.index')
            ->with('flash_message',
             'フランチャイズは正常に編集されました。');
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
