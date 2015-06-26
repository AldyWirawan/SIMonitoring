<?php

use Illuminate\Database\Seeder;

class ProyekTableSeeder extends Seeder {

	public function run()
	{
		Proyek::truncate();
		Proyek::create([
			'id_uuk' => '1',
			'pin' => 'P1111',
			'tanggal_catat' => '',
			'nama_pekerjaan' => 'proyek A',
			'nama_pemberi_kerja' => 'PT. maju sejahtera',
			'nama_ketua_pelaksana' => 'John Doe',
			'kontrak_tanggal' => '',
			'kontrak_nomor' => '123/AB/CDEFG/X/2015',
			'kontrak_akhir_periode' => '',
			'kontrak_nilai_euro' => '',
			'kontrak_nilai_jpy' => '',
			'kontrak_nilai_dollar' => '',
			'kontrak_nilai_rupiah' => '200000000',
			'kontrak_nilai_total' => '200000000',
			'keuangan_invoice_total' => '50000000',
			'sisa_invoice_total' => '100000000',
			'keuangan_usulan_penghapusan_proyek' => '',
			'keuangan_total_realisasi' => '60000000',
			'keuangan_pre_financing' => '',
			'status_pekerjaan' => 'proyek masih berjalan, tidak ada masalah',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '',
			'persentase_progres_bulan_3' => '',
			'persentase_progres_bulan_4' => '',
			'persentase_progres_bulan_5' => '',
			'persentase_progres_bulan_6' => '',
			'persentase_progres_bulan_7' => '',
			'persentase_progres_bulan_8' => '',
			'persentase_progres_bulan_9' => '',
			'persentase_progres_bulan_10' => '',
			'persentase_progres_bulan_11' => '',
			'persentase_progres_bulan_12' => '',
			'persentase_progres_proyek' => '10',
		]);
	}

}
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