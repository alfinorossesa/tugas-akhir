<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('client.editprofile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validated());

        return redirect('editprofile');
    }

}