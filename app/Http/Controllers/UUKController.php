<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UUK;
use App\Proyek;
use App\User;

use Illuminate\Http\Request;

use Datatables;

class UUKController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$UUKs = UUK::all();
		return $UUKs;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $req)
	{
		$new = new UUK();
		$new->nama_uuk = $req->input('nama_uuk');
		$new->waktu_didirikan = $req->input('waktu_didirikan');
		$new->kepemilikan_ITB = $req->input('kepemilikan_ITB');
		$new->penjabat = $req->input('penjabat');
		$new->alamat = $req->input('alamat');

		if($new->save()){
			return array('status'=>'Saved!');
		}
		return array('status'=>'Not Saved!');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return UUK::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		$edit = UUK::find($id);
		if($edit){
			$edit->nama_uuk = $req->input('nama_uuk');
			$edit->waktu_didirikan = $req->input('waktu_didirikan');
			$edit->kepemilikan_ITB = $req->input('kepemilikan_ITB');
			$edit->penjabat = $req->input('penjabat');
			$edit->alamat = $req->input('alamat');

			if($edit->save()){
				return array('status'=>'Saved!');
			}
			return array('status'=>'Not Saved!');
		}
		return array('status'=>'Not Saved!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proyeks = Proyek::where('id_uuk', $id)->get();
		foreach ($proyeks as $proyek) {
			$proyek -> delete();
		}
		$akuns = User::where('role', $id)->get();
		foreach ($akuns as $akun) {
			$akun -> delete();
		}
		$del = UUK::find($id);
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
		$UUKs = UUK::select(['id', 'nama_uuk', 'waktu_didirikan', 'kepemilikan_ITB', 'penjabat', 'alamat']);
        return Datatables::of($UUKs)->make(true);
	}

}
