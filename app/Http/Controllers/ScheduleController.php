<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Studio;
use App\Honnbu;

use Auth;
use Validator;
use DB;

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
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->orderBy('id')->get();
        return view('schedules.index')->with('honnbus', $honnbus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
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
        $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d'))));

        $validator = Validator::make($request->all(), [
          'studio_id' => 'required',
          //'start_date' => 'required|date|after:'.$effectiveDate,
          'start_date' => 'required|date',
          'end_date' => 'required|date|after:start_date',
        ]);

        if(!$validator->fails())
        {
          $schedules1 = Schedule::where('studio_id', $request['studio_id'])
                ->where('start_date', '<=', $request['start_date'])
                ->where('end_date', '>=', $request['start_date'])
                ->get();
          $schedules2 = Schedule::where('studio_id', $request['studio_id'])
                ->where('start_date', '<=', $request['end_date'])
                ->where('end_date', '>=', $request['end_date'])
                ->get();
          $schedules3 = Schedule::where('studio_id', $request['studio_id'])
                ->whereBetween('start_date', array($request['start_date'], $request['end_date']))
                ->get();
          $schedules4 = Schedule::where('studio_id', $request['studio_id'])
                ->whereBetween('end_date', array($request['start_date'], $request['end_date']))
                ->get();
          if ($schedules1->count() > 0 || $schedules2->count() > 0 || $schedules3->count() > 0 || $schedules4->count() > 0) {
            $validator->after(function ($validator) {
              $validator->errors()->add('duration', 'この適用期間は既に存在します！');
            });
          }
        }

        if ($validator->fails()) {
          return redirect()->route('schedules.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $schedule = Schedule::create($request->only('studio_id', 'start_date', 'end_date'));

        $x = 1;
        for($i = 1; $i <= 20; $i++)
        {
          if(!empty($request['coma_'.$i]))
          {
            $schedule->{'coma_'.$x++} = $request['coma_'.$i];
          }
        }
        $schedule->save();

        return redirect()->route('schedules.index')
            ->with('flash_message',
             '予約枠が追加されました。');
      }
      else {
        $studios; $store_id=$request->input('store_id');
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
        if(isset($store_id))
        {
          $studios = Studio::where('store_id', $store_id)->where('delete_flg', '!=', 1)->get();
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
        $schedule = Schedule::findOrFail($id);
        return view('schedules.edit')->with('schedule', $schedule);
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
      $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d'))));

      $validator = Validator::make($request->all(), [
        'studio_id' => 'required',
        //'start_date' => 'required|date|after:'.$effectiveDate,
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
      ]);

      if(!$validator->fails())
      {
        $schedules1 = Schedule::where('id', '!=', $id)
              ->where('studio_id', $request['studio_id'])
              ->where('start_date', '<=', $request['start_date'])
              ->where('end_date', '>=', $request['start_date'])
              ->get();
        $schedules2 = Schedule::where('id', '!=', $id)
              ->where('studio_id', $request['studio_id'])
              ->where('start_date', '<=', $request['end_date'])
              ->where('end_date', '>=', $request['end_date'])
              ->get();
        $schedules3 = Schedule::where('id', '!=', $id)
              ->where('studio_id', $request['studio_id'])
              ->whereBetween('start_date', array($request['start_date'], $request['end_date']))
              ->get();
        $schedules4 = Schedule::where('id', '!=', $id)
              ->where('studio_id', $request['studio_id'])
              ->whereBetween('end_date', array($request['start_date'], $request['end_date']))
              ->get();
        if ($schedules1->count() > 0 || $schedules2->count() > 0 || $schedules3->count() > 0 || $schedules4->count() > 0) {
          $validator->after(function ($validator) {
            $validator->errors()->add('duration', 'この適用期間は既に存在します！');
          });
        }
      }

      if ($validator->fails()) {
        return redirect()->route('schedules.edit', $id)
                      ->withErrors($validator)
                      ->withInput();
      }

      $schedule = Schedule::findOrFail($id);
      $schedule->fill($request->only('start_date', 'end_date'))->save();
      $x = 1;
      for($i = 1; $i <= 20; $i++)
      {
        if(!empty($request['coma_'.$i]))
        {
          $schedule->{'coma_'.$x++} = $request['coma_'.$i];
        }
      }
      for(;$x <= 20; $x++)
      {
        $schedule->{'coma_'.$x} = null;
      }
      $schedule->save();
      return redirect()->route('schedules.index')->with('flash_message', '予約枠は正常に編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
