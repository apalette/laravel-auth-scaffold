<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

	/**
     * Register a user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
	public function register(Request $request)
	{
		// Validate data
		$validator = $this->validator($request->all());
		if ($validator->fails()) {
	        $this->throwValidationException(
	            $request, $validator
	        );
	    }
		
		// Create user 
    	$user = $this->create($request->all());
		
		// Send verification code by mail
		if (Mail::send('auth.emails.verification', ['code' => $user->confirmation_code], function($message) use ($user) {
    		$message->to($user->email, $user->first_name.' '.$user->last_name)->subject('Création de votre compte');
		})) {
			$user->confirmation_send = 1;
			$user->save();
		}
		
		// Redirect back with success message
		return redirect()->back()->with('message', 'Votre compte a été créé. Merci de l\'activer grâce au lien que vous allez recevoir par e-mail.');
	}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
	protected function create(array $data)
	{
    	$confirmation_code = uniqid().str_random(30);
		
    	return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $confirmation_code
        ]);
    }
	
	/**
	 * Verify a user account
	 * 
	 * @param string $code
	 * @return \Illuminate\Http\Response
	 */
	 public function verify($code)
	 {
	 	$user = User::where('confirmation_code', $code)->first();
		if ($user) {
			$user->confirmed = 1;
			$user->save();
		}
		
		return view('auth.verification', [
			'user' => $user
		]);
	 }
	 
	 /**
	 * Login a user
	 * 
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	 public function login(Request $request)
	 {
	 	// Validate fields
	 	$this->validate($request, [
	 		'email' => 'required|email|max:255',
	 		'password' => 'required|min:6'
	 	]);
		
		// Get user by email address
		$user = User::where('email', $request->email)->first();
		if (! $user) {
			return redirect()->back()->withInput()->withErrors('Cette adresse e-mail n\'est associée à aucun compte.');
		}
		
		// Check Password
		if (! password_verify($request->password, $user->password)) {
			return redirect()->back()->withInput()->withErrors('Le mot de passe est incorrect.');
		}
		
		// Check if user account is confirmed
		if (! $user->confirmed) {
			return redirect()->back()->withInput()->withErrors('Merci de confirmer votre compte grâce au lien envoyé sur votre messagerie avant de vous connecter.');
		}
		
		// Auth user
		Auth::login($user, $request->remember ? true : false);
		return redirect('/');
	 }
}
