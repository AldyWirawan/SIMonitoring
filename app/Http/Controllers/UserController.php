<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

use Auth;
use Datatables;
use Hash;
use Redirect;

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

	public function editPass(Request $req)
	{
		$edit = User::find(Auth::user()->id);
		$edit->name = $req->input('name');
		$edit->email = $req->input('email');
		$edit->password = Hash::make($req->input('pass'));
		$edit->role = Auth::user()->role;

		if($edit->save()){
			return Redirect::back()->withMessage('Password Saved!');
		}
		return array('status'=>'Not Saved!');
	}

	public function resetPass($id)
	{
		$reset = User::find($id);
		if ($reset) {
			$reset->password = Hash::make('1234567890');

			if ($reset->save()) {
				return array('status'=>'Saved!');;
			}

			return array('status'=>'Not Saved!');
		} else {
			return array('status'=>'Not Saved!');
		}
	}

	public function editAkun($id, Request $req)
	{
		$edit = User::find($id);
		if ($edit) {
			$edit->name = $req->input('name');
			$edit->email = $req->input('email');
			$edit->password = Hash::make($req->input('password'));
			$edit->role = $req->input('role');

			if ($edit->save()) {
				return array('status' => 'Saved!');
			}

			return array ('status' => 'Saved!');
		}
		return array ('status' => 'Saved!');
	}

	public function destroy($id)
	{
		$del = User::find($id);
		if($del){
			if($del->delete()){
				return array('status'=>'Deleted!');
			}
			return array('status'=>'Not Deleted!');
		}
		return array('status'=>'Not Deleted!');
	}

	public function dataTableAll()
	{
		$Users = User::select(['id', 'name', 'email', 'role']);
        return Datatables::of($Users)->make();
	}

}
