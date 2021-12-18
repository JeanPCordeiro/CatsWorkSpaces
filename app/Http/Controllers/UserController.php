<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        //Changement du mot de passe
        if ((Auth::user()->level !=3) and (Auth::user()->id != $user->id)) return view('home');
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if ((Auth::user()->level !=3) and (Auth::user()->id != $user->id)) return view('home');
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        // 2 cas de figure :
        //   1) changer que le pwd
        //   2) changer que le reste
        //
        if ((Auth::user()->level !=3) and (Auth::user()->id != $user->id)) return view('home');

        if ($request->action == 'EDIT')
        { //EDIT
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();

        }
        else
        { //PWD
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
            ]);
            $hashpassword = Hash::make($request->input('password'));
            $request->merge([
                'password' => $hashpassword,
            ]);
            $user->update($request->all());
        }

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
