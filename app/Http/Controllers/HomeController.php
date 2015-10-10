<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function doLogin(){
		// mengatur login
		// metode POST (lihat route)

		// ambil input user dan cek dengan database
		if (!Auth::attempt(Input::only('username', 'password')))	{
			return Redirect::back()->withInput()->with('alert-danger', 'Username or password incorrect');
		}
		// berhasil, berikan home
		return Redirect::action('HomeController@getIndex');
	}

	public function doLogout(){
		// mengatur logout
		// metode get (lihat route)

		// lakukan logout, redirect ke halaman login
		Auth::logout();
		return Redirect::action('HomeController@showLogin');
	}

}
