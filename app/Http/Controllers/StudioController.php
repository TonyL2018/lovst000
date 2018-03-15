<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Shop;
use App\Course;
use App\StudioCourse;
use App\Schedule;

use Auth;

class StudioController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'checkRole:設定^スタジオ管理']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->store_id)){
          $shops = Shop::where('id', '=', Auth::user()->store_id)->where('delete_flg', '!=', 1)->get();
        }
        elseif(isset(Auth::user()->fc_id) && Auth::user()->fc_id > 0){
          $shops = Shop::where('fc_id', '=', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
        }
        else{
          $shops = Shop::where('delete_flg', '!=', 1)->get();
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
        $shops = Shop::where('id', '=', Auth::user()->store_id)->where('delete_flg', '!=', 1)->get();
      }
      elseif(isset(Auth::user()->fc_id) && Auth::user()->fc_id > 0){
        $shops = Shop::where('fc_id', '=', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
      }
      else{
        $shops = Shop::where('delete_flg', '!=', 1)->get();
      }
      $courses = Course::where('delete_flg', '!=', 1)->get();

      return view("studios.create", compact('shops', 'courses'));
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

      $num = Studio::where('store_id', $request['store_id'])->count();
      if($num < 10)
      {
        $studio->studio_id = str_replace('SH', 'SD', $studio->shop->shop_id).'0'.$num;
      }
      else {
        $studio->studio_id = str_replace('SH', 'SD', $studio->shop->shop_id).$num;
      }
      $studio->save();

      for($i = 0; $i < $request['x']; $i++)
      {
        if(!empty($request['course'.$i]))
        {
          StudioCourse::create(['studio_id' => $studio->id, 'course_id' => $request['course'.$i], 'sort_num' => empty($request['order'.$i])?$i+1:$request['order'.$i]]);
        }
      }

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
        $studio = Studio::findOrFail($id);
        $schedule = Schedule::where('studio_id', $id)
                      ->where('start_date', '<=', date('Y-m-d'))
                      ->where('end_date', '>=', date('Y-m-d'))
                      ->first();
        return view('studios.show', compact('studio', 'schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studio = Studio::findOrFail($id);

        if(isset(Auth::user()->store_id)){
          $shops = Shop::where('id', '=', Auth::user()->store_id)->where('delete_flg', '!=', 1)->get();
        }
        elseif(isset(Auth::user()->fc_id) && Auth::user()->fc_id > 0){
          $shops = Shop::where('fc_id', '=', Auth::user()->fc_id)->where('delete_flg', '!=', 1)->get();
        }
        else{
          $shops = Shop::where('delete_flg', '!=', 1)->get();
        }
        $courses = Course::where('delete_flg', '!=', 1)->get();
        return view('studios.edit', compact('studio', 'shops', 'courses'));
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
          'name'=>'required|max:120',
          'detail'=>'required|max:120',
          'store_id'=>'required'
      ]);

      $studio = Studio::findOrFail($id);
      $studio->fill($request->only('name', 'detail', 'store_id'))->save();
      foreach($studio->courses as $course)
      {
        $course->delete_flg = 1;
        $course->save();
      }

      for($i = 0; $i < $request['x']; $i++)
      {
        if(!empty($request['course'.$i]))
        {
          $_course = StudioCourse::where('studio_id', $studio->id)->where('course_id', $request['course'.$i])->first();
          if(isset($_course))
          {
            $_course->delete_flg = 0;
            $_course->sort_num = empty($request['order'.$i])?$i+1:$request['order'.$i];
            $_course->save();
          }
          else {
            StudioCourse::create(['studio_id' => $studio->id, 'course_id' => $request['course'.$i], 'sort_num' => empty($request['order'.$i])?$i+1:$request['order'.$i]]);
          }
        }
      }

      return redirect()->route('studios.index')
          ->with('flash_message',
           'スタジオは正常に編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studio = Studio::findOrFail($id);
        $studio->delete_flg = 1;
        $studio->save();

        return redirect()->route('studios.index')->with('flash_message', 'スタジオが停止されました。');
    }

    public function list($id)
    {
      $response;
      if(isset($id))
      {
        $studios = Studio::where('store_id', $id)->where('delete_flg', '!=', 1)->get();
        foreach ($studios as $studio) {
          $response = '?'.$studio->id.'|'.$studio->name.'|';
        }
        return $response;
      }
    }

}
