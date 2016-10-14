<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
	
	/**
     * Where to redirect users after password reset.
     *
     * @var string
     */
	protected $redirectPath = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	/**
	 * Send a reset link to the given user.
	 *
	 * @param  Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postEmail(Request $request)
	{
		// Validate fields
	 	$this->validate($request, [
	 		'email' => 'required|email|max:255'
	 	]);
		
		// Get user by email address
		$user = User::where('email', $request->email)->first();
		if (! $user) {
			return redirect()->back()->withInput()->withErrors('Cette adresse e-mail n\'est associée à aucun compte.');
		}

		// Check if user account is confirmed
		if (! $user->confirmed) {
			return redirect()->back()->withInput()->withErrors('Merci de confirmer votre compte grâce au lien envoyé sur votre messagerie avant de changer votre mot de passe.');
		}
		
		// Send password reset link to user
		$response = Password::sendResetLink($request->only('email'), function($m)
        {
            $m->subject('Changement de votre mot de passe');
        });

        switch ($response)
        {
            case Password::RESET_LINK_SENT:
           		return redirect()->back()->with('message', 'Merci d\'utiliser le lien que vous allez recevoir par e-mail pour changer votre mot de passe.');

            case Password::INVALID_USER:
                return redirect()->back()->withErrors('Une erreur est survenue.');
        }
	}
}
