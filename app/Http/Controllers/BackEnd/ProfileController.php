<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = auth()->user();
        //dd($user);
        return view('backend.profile.index', compact('user'));
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
        //dd($request, $id);
        //
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        User::find($id)->update([
            'name' => $request->input('name'), 
            'email' => $request->input('email')
        ]);

        return redirect()->back()->with('message', 'user information updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pwd(Request $request, $id)
    {

        $this->validate($request, [
            'current-password' => 'required|string',
            'new-password' => 'required|string',
            'new-password-confirm' => 'required|string|same:new-password',
        ]);

        $user = User::find($id);
        if (Hash::check($request->input('current-password'), $user->password)) {

            $user->fill([
                'password' => Hash::make($request->input('new-password'))
            ])->update();
            return redirect()->route('login');
        }

        return redirect()->route('prof');
    }
}
