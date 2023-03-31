<?php

namespace App\Http\Controllers;

use App\Http\Requests\changePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('settings');
    }

    public function changePassword(changePasswordRequest $request) {

        $user = User::find(Auth::user()->id);
        $user->password = \Hash::make($request->input('newPassword'));
        $user->save();

        return redirect((route('settings')));
    }
}
