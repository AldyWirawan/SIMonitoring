<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProyekDashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	public function dataProgres(){
		$progres = DB::table('proyek')
					->select(DB::raw('nama_uuk, AVG(persentase_progres_proyek) as avg'))
					->groupBy('id_uuk')
					->get();
		return (json_encode($progres));
	}

	public function dataKontrak(){
		$progres = DB::table('proyek')
					->select(DB::raw('nama_uuk, AVG(kontrak_nilai_total) as avg'))
					->groupBy('id_uuk')
					->get();
		return (json_encode($progres));
	}

}
