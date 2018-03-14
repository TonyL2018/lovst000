<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupation;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupations = Occupation::all();
        return view('occupations.index')->with('occupations', $occupations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occupations.create');
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
          'name' => 'required|max:120',
        ]);

        $occupation = Occupation::create(['name' => $request->input('name'), 'delete_flg' => $request->input('delete_flg')]);
        return redirect()->route('occupations.index')->with('flash_message', 'タッフ種別が追加されました。');
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
        $occupation = Occupation::findOrFail($id);
        return view('occupations.edit')->with('occupation', $occupation);
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
        $this->validate($request, [
          'name' => 'required|max:120',
        ]);
        $occupation = Occupation::findOrFail($id);
        $occupation->fill(['name' => $request->input('name'), 'delete_flg' => $request->input('delete_flg')])->save();
        return redirect()->route('occupations.index')->with('flash_message', 'スタッフは正常に編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->delete_flg = 1;
        $occupation->save();
        return redirect()->route('occupations.index')->with('flash_message', 'スタッフ種別は正常に停止されました。');
    }
}
