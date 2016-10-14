<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Front Routes
 */
$this->get('/', 'HomeController@index');

/*
 *  Authentication Routes
 */ 
$this->get('connexion', 'Auth\AuthController@showLoginForm');
$this->post('connexion', 'Auth\AuthController@login');
$this->get('deconnexion', 'Auth\AuthController@logout');
$this->get('mot-de-passe', 'Auth\PasswordController@getEmail');
$this->post('mot-de-passe', 'Auth\PasswordController@postEmail');
$this->get('nouveau-mot-de-passe/{token}', 'Auth\PasswordController@getReset');
$this->post('nouveau-mot-de-passe', 'Auth\PasswordController@postReset');

/**
 * Registration Routes
 */
$this->get('inscription', 'Auth\AuthController@showRegistrationForm');
$this->post('inscription', 'Auth\AuthController@register');
$this->get('verification/{code}', 'Auth\AuthController@verify');

/**
 * Debug
 */
if (config('app.env') === 'local') {
	$this->get('/debug/auth/verification/mail/display', 'DebugController@authVerificationMailDisplay');
	$this->get('/debug/auth/password/mail/display', 'DebugController@authPasswordMailDisplay');
}
