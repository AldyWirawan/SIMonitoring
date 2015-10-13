<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

use Datatables;

use Hash;

class UserController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $req)
	{
		$new = new User();
		$new->name = $req->input('name');
		$new->email = $req->input('email');
		$new->password = Hash::make($req->input('password'));
		$new->role = $req->input('role');

		if($new->save()){
			return array('status'=>'Saved!');
		}
		return array('status'=>'Not Saved!');
	}

	public function dataTableAll()
	{
		$Users = User::select(['id', 'name', 'email', 'role']);
        return Datatables::of($Users)->make();
	}

}
