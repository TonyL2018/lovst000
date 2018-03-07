<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Honnbu;
use App\Shop;

use Auth;

class HonnbuController extends Controller
{

    public function __construct(){
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
        $honnbus = Honnbu::where('id', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
      }
      else {
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
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
      $this->validateInput($request);

      $honnbu = Honnbu::create($request->only('name', 'start_date', 'duration', 'corporation', 'representative',
      'signer', 'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail'));

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
        $this->validateInput($request);
        $input = $request->only('name', 'start_date', 'duration', 'corporation', 'representative',
        'signer', 'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail');
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
        $honnbu = Honnbu::findOrFail($id);
        foreach ($honnbu->$shops as $shop) {
          foreach ($shop->studios as $studio) {
            $studio->delete_flg = 1;
            $studio->save();
          }
          $shop->delete_flg = 1;
          $shop->save();
        }
        $honnbu->delete_flg = 1;
        $honnbu->save();
        return redirect()->route('honnbus.index')
            ->with('flash_message', 'フランチャイズが削除されました。');
    }

    protected function validateInput(Request $request)
    {
      $this->validate($request, [
          'name'=>'required|max:120',
          'start_date'=>'required|date',
          'duration'=>'required|max:50',
          'corporation'=>'required|max:120',
          'representative'=>'required|max:120',
          'signer'=>'required|max:50',
          'capital'=>'required|max:120',
          'tele_kaisya'=>'required|max:120',
          'tele_kojin'=>'required|max:120',
          'adress'=>'required|max:120',
          'detail'=>'required|max:120'
      ]);
    }
}
