<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("IsUserAdmin");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //display all users
    {
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //send back a form to create new user
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() //save the submitted user data to save new user
    {
        $data = request()->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            "roles" => ""
        ]);

        $newUser = new User();
        $newUser->name = $data["name"];
        $newUser->email = $data["email"];
        $newUser->password = Hash::make($data["password"]);
        $newUser->created_at = Carbon::now();
        $newUser->updated_at = Carbon::now();
        $newUser->save();

        foreach(request()->input("roles") as $role)
        {
            $newUser->roles()->attach($role);
        }

        return redirect("/admin/users/" . $newUser->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) //display one user
    {
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) //send a form to edit a user prefilled with the user data
    {
        return view("users.edit", compact("user"));
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
        $data = request()->validate([
            "name" => "required",
            "email" => "required|email",
            "roles" => ""
        ]);

        foreach(request()->input("roles") as $role)
        {
            $user->roles()->sync($role);
        }

        $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user) //delete a user
        //delete user
        //redirect
        {
            //delete user
            //redirect
            $user->deleted_by = Auth::id();
            $user->save();
            $user->delete();
            return redirect("/admin/users");
        }
}
