<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = array
        (
           
            'users' => User::orderBy('roles','desc')->paginate(10),
            'title'=> 'Users',
        );
       
        return view('user.users')->with($data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title= 'Create User';
        return view('user.createuser',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           
           
            'name' => 'required',
            'role' => 'required',
            'email'=>'required',
            'password'=>'required'
     
        ]);  
       $user = new User();
       $user->name = $request->input('name');
       $user->roles = $request->input('role');
       $user->email = $request->input('email');
       $user->password = $request->input('password');
       //dd($user);
       $user->save();
       return redirect()->route('users.show',[ $user->id ])->with('success','User Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'User Detail';
        $user = User::find($id);
        return view('user.userdetail',compact('user','title'));
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
        $this->validate($request,[
           
           
            'name' => 'required',
            'role' => 'required',
            'email'=>'required',
     
        ]);      
       
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->roles = $request->input('role');
        $user->email = $request->input('email');
      
        $user->save();
        return redirect()->back()->with('success', "$user->name Profile successfully updated");
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
