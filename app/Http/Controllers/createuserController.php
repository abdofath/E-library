<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User ;
use App\Role;

class createuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showAddAdmin()
    {
        $roles= Role::where('name', '!=', 'users')->get();
        // dd('here');
       return view('admin.add_Admin')->with('roles',$roles);
    }

    public function storeAdmin(Request $request)
    {


        $role = Role::find($request->role);
        $admin = new User();
        // dd($request->input('name'));

        $admin->name=$request->input('name');

        $admin->email=$request->input('email');
        $admin->password=Hash::make($request->input('password'));
        $admin->save();


        $admin->roles()->attach($request->role);

        return redirect(route('users.index'))->with('msg','Admin Added Successfully');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.createuser');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'psw-repeat'=>['required','string','min:8|confirmed'],

               ]);

               $user = new User();
         $user->name=$request->input('name');

         $user->email=$request->input('email');
       $user->password=Hash::make($request->input('password'));


         $user->save();
         return redirect(route('users.index'))->with('msg','Member Added Successfully');



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
        $user=User::find($id);
        $user->delete();


        return redirect(route('users.index'))->with('msg','Delete Done');
    }
}
