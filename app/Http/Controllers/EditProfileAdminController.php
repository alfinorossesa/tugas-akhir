<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileAdminRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditProfileAdminController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('admin.editprofileadmin',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileAdminRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validated());

        return redirect('editprofileadmin');
    }

}
