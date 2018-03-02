<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Studio;
use App\Honnbu;

use Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'checkRole:設定^予約枠作成・編集']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $honnbus = Honnbu::all();
        return view('schedules.index')->with('honnbus', $honnbus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $honnbus = Honnbu::all();
        $studios;
        return view('schedules.create', compact('honnbus', 'studios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $status = $request->input('status');
      if(isset($status) && $status === 'submit')
      {
        $this->validate($request, [
          'studio_id' => 'required',
          'start_date' => 'required|date',
          'end_date' => 'required|date',
          'coma_1' => 'required',
          'coma_2' => 'required',
          'coma_3' => 'required',
          'coma_4' => 'required',
          'coma_5' => 'required',
          'coma_6' => 'required',
          'coma_7' => 'required',
          'coma_8' => 'required',
          'coma_9' => 'required',
          'coma_10' => 'required',
        ]);

        $schedule = Schedule::create($request->only('studio_id', 'start_date', 'end_date', 'coma_1', 'coma_2', 'coma_3', 'coma_4', 'coma_5', 'coma_6', 'coma_7', 'coma_8', 'coma_9', 'coma_10'));

        return redirect()->route('schedules.index')
            ->with('flash_message',
             '予約枠が追加されました。');
      }
      else {
        $studios; $store_id=$request->input('store_id');
        $honnbus = Honnbu::all();
        if(isset($store_id))
        {
          $studios = Studio::where('store_id', $store_id)->get();
        }
        return view('schedules.create', compact('store_id', 'studios', 'honnbus'));
      }
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
