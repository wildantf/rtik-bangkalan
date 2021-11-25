<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserProfileRequest;

class UserProfileController extends Controller
{

    public function index()
    {
        // return view('dashboard.categories.test',[
        //     'users'=> User::all(),
        // ]);
    }

    public function create()
    {
        //
    }

    public function store(UserProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        // dd($profile);
        return view('users.profile.show', [
            "user" => $profile,
        ]);
    }

    public function edit(User $profile)
    {
        // abort respone jika bukan user
        abort_if(auth()->user()->username !== $profile->username, 403,'Anda mau kemana hey');

        return view('users.profile.edit', [
            "user" => $profile,
        ]);
    }


    public function update(UserProfileRequest $request, User $profile)
    {
        // dd($user->username);
        // TODO : HAK AKSES
        $validatedData = $request->validated();

        if ($request->file('photo_profile')) {
            Storage::delete($profile->photo_profile);

            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photo-profile');
        }
        $profile->update($validatedData);
        return back()->with('success', 'User Berhasil diedit');
    }

    public function destroy(User $user)
    {
        //
    }
}
