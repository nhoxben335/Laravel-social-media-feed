<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //display all users
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user) //send back a form to create new user
    {
//        return view('users.create', compact('user'));
        $roles = \App\Role::all();
        return view('users.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //save the submitted user data to save new user
    {
        return 'store'; //temporary
        //save the submitted data
        //redirect when done (to index)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) //display one user
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) //send a form to edit a user prefilled with the user data
    {
        $roles = \App\Role::all();
        return view('users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) //save the changes from the edit form
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        session()->flash('status', 'The user is successfully updated');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) //delete a user
    {
        //delete user
        //redirect
        $user = \App\User::find($user);
        if($user->delete()){
            DB::table('users')->where('id', $user->id)
                ->update(array('deleted_by'=> Auth::user()->id));
        };
        session()->flash('status', 'The user is successfully deleted');
        return redirect()->route('users.index');
    }
}
