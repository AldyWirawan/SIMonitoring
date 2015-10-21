<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Auth;

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
		if (Auth::user()->role == 'admin') {
			$progres = DB::table('proyek')
						->select(DB::raw('nama_uuk, AVG(persentase_progres_proyek) as avg'))
						->groupBy('id_uuk')
						->get();
		} else {
			$progres = DB::table('proyek')
						->select('nama_pekerjaan', 'persentase_progres_proyek')
						->get();
		}
		return (json_encode($progres));
	}

	public function dataKontrak(){
		if (Auth::user()->role == 'admin') {
			$kontraks = DB::table('proyek')
						->select(DB::raw('nama_uuk, AVG(kontrak_nilai_total) as avg'))
						->groupBy('id_uuk')
						->get();
		} else {
			$kontraks = DB::table('proyek')
						->select('nama_pekerjaan', 'kontrak_nilai_total')
						->get();
		}
		return (json_encode($kontraks));
	}

}
