<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Status;

use Auth;

class TemplateController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'checkRole:設定^メールテンプレート作成・編集']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $templates = Template::all();
      return view('templates.index')->with('templates', $templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $statuses = Status::all();
      return view('templates.create')->with('statuses', $statuses);
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
          'title' => 'required|max:120',
          'content' => 'required|max:500',
          'status' => 'required|integer',
        ]
        );
        $template = Template::create(['name' => $request->input('name'),
          'title' => $request->input('title'),
          'status' => $request->input('status'),
          'content' => $request->input('content'),
          'owner_id' => Auth::user()->id]);

        return redirect()->route('templates.index')->with('flash_message', 'メールテンプレが追加されました。');
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
        $template = Template::findOrFail($id);
        $template->delete();

        return redirect()->route('templates.index')->with('flash_message', 'メールテンプレは正常に削除されました。');
    }
}
