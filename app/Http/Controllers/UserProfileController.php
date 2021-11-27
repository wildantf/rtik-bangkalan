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

    }

    public function create()
    {
        //
    }

    public function store(UserProfileRequest $request)
    {
        //
    }

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

        return view('users.profile.edit', [
            "user" => $profile,
        ]);
    }

    public function update(UserProfileRequest $request, User $profile)
    {
        // dd($user->username);
        // FIXME : Ubah ketika edit member page dibuat
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
