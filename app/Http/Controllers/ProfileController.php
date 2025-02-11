<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\AuditTrail;



use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user();

        $user->fill($request->validated());

        if($request->hasFile('photo')){
            if($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $path = $request->file('photo')->store('public');

            $user->photo = $path;
        }
        else{
            $path = $user->photo;

            $user->photo = $path;
        }
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // Save user data
        $user->save();

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Profile Information",
            'table_name' => "Users",
            'record_id' => $user->id,
        ]);

        return Redirect::route('admin.profile.edit')->with('success_update_profile', 'Successfully Updated Profile Information');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
