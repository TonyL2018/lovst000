<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Question;

use Auth;

use Debugbar;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
        ]);

        $course = Course::create(['name' => $request->input('name'), 'owner_id' => Auth::user()->id, 'new_flg' => True]);

        $x = $request->input('x');
        for($i = 1; $i <= $x; $i++)
        {
          $questionName = $request->input('question_name'.$i);
          if(isset($questionName) && !empty($questionName))
          {
            Question::create(['course_id' => $course->id, 'question_name' => $questionName, 'new_flg' => True]);
          }
        }

        return redirect()->route('courses.index')->with('flash_message', '撮影内容が追加されました。');
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
        $course = Course::findOrFail($id);
        return view('courses.edit')->with('course', $course);
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
      ]);

      $course = Course::findOrFail($id);
      $course->name = $request['name'];
      $course->save();
      foreach ($course->questions as $question) {
        $question->delete_flg = 1;
        $question->save();
      }

      $x = $request->input('x');
      for($i = 1; $i <= $x; $i++)
      {
        $questionName = $request->input('question_name'.$i);
        if(isset($questionName) && !empty($questionName))
        {
          $question_c = Question::where('course_id', $course->id)->where('question_name', $questionName)->first();
          if(isset($question_c))
          {
            $question_c->delete_flg = 0;
            $question_c->save();
          }
          else{
            Question::create(['course_id' => $course->id, 'question_name' => $questionName, 'new_flg' => True]);
          }
        }
      }

      return redirect()->route('courses.index')->with('flash_message', '撮影内容は正常に編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        foreach ($course->questions as $question) {
          $question->delete_flg = 1;
          $question->save();
        }
        $course->delete_flg = 1;
        $course->save();

        return redirect()->route('courses.index')->with('flash_message', '撮影内容は正常に停止されました。');
    }
}
