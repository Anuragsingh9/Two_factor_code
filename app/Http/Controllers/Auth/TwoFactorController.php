<?php

namespace App\Http\Controllers\Auth;
use App\Events\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Http\Request;
use App\User;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'twofactor']);
    }


     /*
     * Display the two factor form
     */
    public function index() 
    {
        return view('auth.twoFactor');
    }

    /*
        Compares the two_factor_code and reset two_factor_code in db
    */ 

    public function store(Request $request)
    {

        $request->validate([
            'two_factor_code' => 'integer|required',
        ]);

        $user = auth()->user();

        if($request->input('two_factor_code') == $user->two_factor_code)
        {
            $user->resetTwoFactorCode();
            event(new SuperAdmin($user));
            return view('success');
            
        }
        return redirect()->back()->withErrors(['two_factor_code' => 'The two factor code you have entered does not match']);
    }
    /** 
     * Resends the two_factor_code on mail
     * 
     */
    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());

        return redirect()->back()->withMessage('The two factor code has been sent again');
    }
}