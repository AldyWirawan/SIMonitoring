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
						->where('id_uuk', Auth::user()->role)
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
						->where('id_uuk', Auth::user()->role)
						->get();
		}
		return (json_encode($kontraks));
	}

	public function dataPendapatan(){
		if (Auth::user()->role == 'admin') {
			$pendapatans = DB::table('proyek')
						->select(DB::raw('nama_uuk, AVG(keuangan_pendapatan) as avg'))
						->groupBy('id_uuk')
						->get();
		} else {
			$pendapatans = DB::table('proyek')
						->select('nama_pekerjaan', 'keuangan_pendapatan')
						->where('id_uuk', Auth::user()->role)
						->get();
		}
		return (json_encode($pendapatans));
	}

	public function dataLaba(){
		if (Auth::user()->role == 'admin') {
			$labas = DB::table('proyek')
						->select(DB::raw('nama_uuk, AVG(keuangan_laba) as avg'))
						->groupBy('id_uuk')
						->get();
		} else {
			$labas = DB::table('proyek')
						->select('nama_pekerjaan', 'keuangan_laba')
						->where('id_uuk', Auth::user()->role)
						->get();
		}
		return (json_encode($labas));
	}

	public function dataDividen(){
		if (Auth::user()->role == 'admin') {
			$dividens = DB::table('proyek')
						->select(DB::raw('nama_uuk, AVG(keuangan_dividen) as avg'))
						->groupBy('id_uuk')
						->get();
		} else {
			$dividens = DB::table('proyek')
						->select('nama_pekerjaan', 'keuangan_dividen')
						->where('id_uuk', Auth::user()->role)
						->get();
		}
		return (json_encode($dividens));
	}

}
