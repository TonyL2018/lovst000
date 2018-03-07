<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Honnbu;
use Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'checkRole:設定^アカウント管理']);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        $honnbus = Honnbu::where('delete_flg', '!=', 1)->get();
        return view('users.create', compact('roles', 'honnbus'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validateInput($request);

        $user = User::create($request->only('email', 'name', 'password', 'staff_id', 'last_name_kanji',
        'first_name_kanji', 'last_name_kana', 'first_name_kana', 'fc_id'));

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {
          foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r); //Assigning role to user
          }
        }
        else{
          $role_r = Role::where('id', '=', $roles)->firstOrFail();
          $user->assignRole($role_r); //Assigning role to user
        }
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'ユーザーが追加されました。');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $honnbus = Honnbu::all();

        return view('users.edit', compact('user', 'roles', 'honnbus'));

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields
        $this->validateInput($request);
        $input = $request->only(['name', 'email', 'password', 'staff_id', 'last_name_kanji',
        'first_name_kanji', 'last_name_kana', 'first_name_kana', 'fc_id']);
        $roles = $request['roles'];
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'ユーザーは正常に編集されました。');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'ユーザーは正常に削除されました。');
    }

    protected function validateInput(Request $request)
    {
      $this->validate($request, [
          'staff_id'=>'required|integer',
          'name'=>'required|max:120|unique:users',
          'last_name_kanji'=>'required|max:120',
          'first_name_kanji'=>'required|max:120',
          'last_name_kana'=>'required|max:120',
          'first_name_kana'=>'required|max:120',
          'email'=>'required|email|unique:users',
          'roles'=>'required',
          'password'=>'required|min:6|confirmed'
      ]);
    }
}
