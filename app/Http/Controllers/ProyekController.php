<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyek;

use Illuminate\Http\Request;

class ProyekController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proyeks = Proyek::all();
		return $proyeks;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $req)
	{
		$new = new Proyek();
		$new->id_uuk = $req->input('id_uuk');
		$new->pin = $req->input('pin');
		$new->tanggal_catat = $req->input('tanggal_catat');
		$new->nama_pekerjaan = $req->input('nama_pekerjaan');
		$new->nama_pemberi_kerja = $req->input('nama_pemberi_kerja');
		$new->nama_ketua_pelaksana = $req->input('nama_ketua_pelaksana');
		$new->kontrak_tanggal = $req->input('kontrak_tanggal');
		$new->kontrak_nomor = $req->input('kontrak_nomor');
		$new->kontrak_akhir_periode = $req->input('kontrak_akhir_periode');
		$new->kontrak_nilai_euro = $req->input('kontrak_nilai_euro');
		$new->kontrak_nilai_jpy = $req->input('kontrak_nilai_jpy');
		$new->kontrak_nilai_dollar = $req->input('kontrak_nilai_dollar');
		$new->kontrak_nilai_rupiah = $req->input('kontrak_nilai_rupiah');
		$new->kontrak_nilai_total = $req->input('kontrak_nilai_total');
		$new->keuangan_invoice_total = $req->input('keuangan_invoice_total');
		$new->sisa_invoice_total = $req->input('sisa_invoice_total');
		$new->keuangan_usulan_penghapusan_proyek = $req->input('keuangan_usulan_penghapusan_proyek');
		$new->keuangan_total_realisasi = $req->input('keuangan_total_realisasi');
		$new->keuangan_pre_financing = $req->input('keuangan_pre_financing');
		$new->status_pekerjaan = $req->input('status_pekerjaan');
		$new->persentase_progres_bulan_1 = $req->input('persentase_progres_bulan_1');
		$new->persentase_progres_bulan_2 = $req->input('persentase_progres_bulan_2');
		$new->persentase_progres_bulan_3 = $req->input('persentase_progres_bulan_3');
		$new->persentase_progres_bulan_4 = $req->input('persentase_progres_bulan_4');
		$new->persentase_progres_bulan_5 = $req->input('persentase_progres_bulan_5');
		$new->persentase_progres_bulan_6 = $req->input('persentase_progres_bulan_6');
		$new->persentase_progres_bulan_7 = $req->input('persentase_progres_bulan_7');
		$new->persentase_progres_bulan_8 = $req->input('persentase_progres_bulan_8');
		$new->persentase_progres_bulan_9 = $req->input('persentase_progres_bulan_9');
		$new->persentase_progres_bulan_10 = $req->input('persentase_progres_bulan_10');
		$new->persentase_progres_bulan_11 = $req->input('persentase_progres_bulan_11');
		$new->persentase_progres_bulan_12 = $req->input('persentase_progres_bulan_12');
		$new->persentase_progres_proyek = $req->input('persentase_progres_proyek');
		
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
		return Proyek::find($id);
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
	public function update($id)
	{
		$edit = Proyek::find($id);
		if($edit){
			$edit->id_uuk = $req->input('id_uuk');
			$edit->pin = $req->input('pin');
			$edit->tanggal_catat = $req->input('tanggal_catat');
			$edit->nama_pekerjaan = $req->input('nama_pekerjaan');
			$edit->nama_pemberi_kerja = $req->input('nama_pemberi_kerja');
			$edit->nama_ketua_pelaksana = $req->input('nama_ketua_pelaksana');
			$edit->kontrak_tanggal = $req->input('kontrak_tanggal');
			$edit->kontrak_nomor = $req->input('kontrak_nomor');
			$edit->kontrak_akhir_periode = $req->input('kontrak_akhir_periode');
			$edit->kontrak_nilai_euro = $req->input('kontrak_nilai_euro');
			$edit->kontrak_nilai_jpy = $req->input('kontrak_nilai_jpy');
			$edit->kontrak_nilai_dollar = $req->input('kontrak_nilai_dollar');
			$edit->kontrak_nilai_rupiah = $req->input('kontrak_nilai_rupiah');
			$edit->kontrak_nilai_total = $req->input('kontrak_nilai_total');
			$edit->keuangan_invoice_total = $req->input('keuangan_invoice_total');
			$edit->sisa_invoice_total = $req->input('sisa_invoice_total');
			$edit->keuangan_usulan_penghapusan_proyek = $req->input('keuangan_usulan_penghapusan_proyek');
			$edit->keuangan_total_realisasi = $req->input('keuangan_total_realisasi');
			$edit->keuangan_pre_financing = $req->input('keuangan_pre_financing');
			$edit->status_pekerjaan = $req->input('status_pekerjaan');
			$edit->persentase_progres_bulan_1 = $req->input('persentase_progres_bulan_1');
			$edit->persentase_progres_bulan_2 = $req->input('persentase_progres_bulan_2');
			$edit->persentase_progres_bulan_3 = $req->input('persentase_progres_bulan_3');
			$edit->persentase_progres_bulan_4 = $req->input('persentase_progres_bulan_4');
			$edit->persentase_progres_bulan_5 = $req->input('persentase_progres_bulan_5');
			$edit->persentase_progres_bulan_6 = $req->input('persentase_progres_bulan_6');
			$edit->persentase_progres_bulan_7 = $req->input('persentase_progres_bulan_7');
			$edit->persentase_progres_bulan_8 = $req->input('persentase_progres_bulan_8');
			$edit->persentase_progres_bulan_9 = $req->input('persentase_progres_bulan_9');
			$edit->persentase_progres_bulan_10 = $req->input('persentase_progres_bulan_10');
			$edit->persentase_progres_bulan_11 = $req->input('persentase_progres_bulan_11');
			$edit->persentase_progres_bulan_12 = $req->input('persentase_progres_bulan_12');
			$edit->persentase_progres_proyek = $req->input('persentase_progres_proyek');

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
		$del = Proyek::find($id);
		if($del){
			if($del->delete()){
				return array('status'=>'Deleted!');
			}
			return array('status'=>'Not Deleted!');
		}
		return array('status'=>'Not Deleted!');
	}

}
