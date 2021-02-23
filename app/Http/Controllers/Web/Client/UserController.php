<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::findOrFail(Auth::id());

        return view('account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        
        $user->update($request->all());

        $user->refresh();

        session()->flash('info', 'Your details has been updated');

        return view('account', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
            $user =  User::findOrFail(Auth::id());
            Auth::logout();
            $user->delete();
            session()->flash('info', 'Your account has been deleted');
            return redirect()->route('home');
        } 

        abort(403);

    }
}
