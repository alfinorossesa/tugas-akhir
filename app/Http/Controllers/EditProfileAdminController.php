<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect('editprofileadmin');
    }

}
