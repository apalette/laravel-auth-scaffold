<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DebugController extends Controller
{
    /**
     * Show the auth verification mail
     *
	 * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authVerificationMailDisplay(Request $request)
    {
    	return view('auth.emails.verification', [
        	'code' => uniqid().str_random(30)
        ]);
    }
	
	/**
     * Show the password reset mail
     *
	 * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authPasswordMailDisplay(Request $request)
    {
    	return view('auth.emails.password', [
        	'token' => uniqid().str_random(30),
			'user' => null
        ]);
    }
}