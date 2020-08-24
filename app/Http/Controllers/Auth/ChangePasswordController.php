<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MatchNewPassword;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePasswordController extends Controller
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
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('auth.passwords.changePassword');
    }

    /**
     * Show the application dashboard
     *
     * @param Request $request
     * @return void
     */

    public function store(Request $request)
    {
        $request->validate([
            'current_password'  => ['required', new MatchOldPassword],
            'new_password' => ['required','string', 'min:8',new MatchNewPassword],
            'new_confirm_password' => ['same:new_password'],
        ]);



        User::find(auth()->user()->id)->update(['password' =>Hash::make($request->new_password)]);
        return redirect('/home')->with('toast_success','Password change successfully!');
    }
}
