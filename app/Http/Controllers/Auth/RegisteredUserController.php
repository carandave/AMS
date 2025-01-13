<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile' => ['required', 'image', 'max:1048']
        ]);

        $path = $request->file('profile')->store('public');

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'student_id' => $request->student_id,
            'role' => 'Student',
            'status' => 'Pending',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => bcrypt($request->password),
            'photo' => $path
        ]);

        event(new Registered($user));

        // Auth::login($user);

        // if(Auth::user()->role === 'admin'){
        //     return redirect()->route('admin.dashboard');
        // }

        // else if(Auth::user()->role === 'student'){
        //     return redirect()->route('student.dashboard');
        // }

        return redirect('/register')->with('success', 'Your account has been successfully registered. An administrator must approve your account before you can log in.');
    }
}
