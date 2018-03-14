<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Honnbu;
use App\Occupation;
use App\StaffOccupation;

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
        $users = User::where('delete_flg', '!=', 1)->get();
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
        $occupations = Occupation::where('delete_flg', '!=', 1)->get();
        return view('users.create', compact('roles', 'honnbus', 'occupations'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validateInput($request);
        $this->validate($request, [
            'name'=>'required|max:120|unique:user',
        ]);

        $user = User::create($request->only('email', 'name', 'password', 'last_name_kanji',
        'first_name_kanji', 'last_name_kana', 'first_name_kana', 'fc_id', 'store_id', 'remarks'));

        if(isset($request['store_id']) && $request['store_id'] != '')
        {
          $num = User::where('store_id', $request['store_id'])->count();
          if($num > 0 && $num < 10)
          {
            $user->staff_id = str_replace('SH', 'ST', $user->shop->shop_id).'0'.$num;
          }
          else {
            $user->staff_id = str_replace('SH', 'ST', $user->shop->shop_id).$num;
          }
        }
        elseif(isset($request['fc_id']) && $request['fc_id'] > 0)
        {
          $user->staff_id = str_replace('FC', 'ST', $user->honnbu->fc_id).'00'.$user->id;
        }
        else {
          $user->staff_id = 'ST00000'.$user->id;
        }
        $user->save();

        $occupations = $request['occupations'];
        if(isset($occupations))
        {
          if(is_array($occupations))
          {
            foreach ($occupations as $occupation) {
              $staffOccupation = new StaffOccupation();
              $staffOccupation->staff_id = $user->id;
              $staffOccupation->occupation_id = $occupation;
              $staffOccupation->save();
            }
          }
          else {
            $staffOccupation = new StaffOccupation();
            $staffOccupation->staff_id = $user->id;
            $staffOccupation->occupation_id = $occupations;
            $staffOccupation->save();
          }
        }

        $roles = $request['roles']; //Retrieving the roles field
        if (isset($roles)) {
          if(is_array($roles)){
            foreach ($roles as $role) {
              $role_r = Role::where('id', '=', $role)->firstOrFail();
              $user->assignRole($role_r); //Assigning role to user
            }
          }
          else{
            $role_r = Role::where('id', '=', $roles)->firstOrFail();
            $user->assignRole($role_r); //Assigning role to user
          }
        }
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
        $honnbus = Honnbu::available();
        $occupations = Occupation::available();

        return view('users.edit', compact('user', 'roles', 'honnbus', 'occupations'));

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
        $input = $request->only(['name', 'email', 'password', 'last_name_kanji',
        'first_name_kanji', 'last_name_kana', 'first_name_kana', 'fc_id', 'store_id', 'remarks']);
        $roles = $request['roles'];
        $user->fill($input)->save();

        foreach ($user->occupations as $occupation_c) {
          $occupation_c->delete();
        }
        $occupations = $request->input('occupations');
        if(isset($occupations))
        {
          if(is_array($occupations))
          {
            foreach ($occupations as $occupation) {
              $staffOccupation = new StaffOccupation();
              $staffOccupation->staff_id = $user->id;
              $staffOccupation->occupation_id = $occupation;
              $staffOccupation->save();
            }
          }
          else {
            $staffOccupation = new StaffOccupation();
            $staffOccupation->staff_id = $user->id;
            $staffOccupation->occupation_id = $occupations;
            $staffOccupation->save();
          }
        }

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
        //$user->delete();
        $user->delete_flg = 1;
        $user->save();

        return redirect()->route('users.index')
            ->with('flash_message',
             'ユーザーは正常に削除されました。');
    }

    protected function validateInput(Request $request)
    {
      $this->validate($request, [
          'last_name_kanji'=>'required|max:120',
          'first_name_kanji'=>'required|max:120',
          'last_name_kana'=>'required|max:120',
          'first_name_kana'=>'required|max:120',
          'email'=>'required|email',
          'roles'=>'required',
          'fc_id'=>'required',
          'password'=>'required|min:6|confirmed'
      ]);
    }

}
