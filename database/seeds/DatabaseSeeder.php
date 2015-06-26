<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;

use App\UUK;
use App\Proyek;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UUKTableSeeder');

		$this->call('ProyekTableSeeder');

		$this->command->info('seeded!');
	}

}

class UUKTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Proyek')->delete(); // tackling foreign key restriction
		DB::table('UUK')->delete();
		UUK::create([
			'nama_uuk' => 'UUK A',
			'waktu_didirikan' => '2015',
			'kepemilikan_ITB' => '80%',
			'penjabat' => 'Komisaris Utama : Prof. A',
			'alamat' => 'jalan kerucut',
		]);
	}

}

class ProyekTableSeeder extends Seeder {

	public function run()
	{
		$tanggal_catat = date("Y-m-d", strtotime("2015-06-25"));
		$kontrak_tanggal = date("Y-m-d", strtotime("2015-07-01"));
		$kontrak_akhir_periode = date("Y-m-d", strtotime("2016-07-01"));
		$UUK = DB::table('UUK')->get();
		Proyek::create([
			'id_uuk' => $UUK[0]->id,
			'nama_uuk' => UUK::find($UUK[0]->id)->nama_uuk,
			'pin' => 'P1111',
			'tanggal_catat' => $tanggal_catat,
			'nama_pekerjaan' => 'proyek A',
			'nama_pemberi_kerja' => 'PT. maju sejahtera',
			'nama_ketua_pelaksana' => 'John Doe',
			'kontrak_tanggal' => $kontrak_tanggal,
			'kontrak_nomor' => '123/AB/CDEFG/X/2015',
			'kontrak_akhir_periode' => $kontrak_akhir_periode,
			'kontrak_nilai_euro' => '0',
			'kontrak_nilai_jpy' => '0',
			'kontrak_nilai_dollar' => '0',
			'kontrak_nilai_rupiah' => '200000000',
			'kontrak_nilai_total' => '200000000',
			'keuangan_invoice_total' => '50000000',
			'keuangan_sisa_invoice_total' => '100000000',
			'keuangan_usulan_penghapusan_proyek' => '0',
			'keuangan_total_realisasi' => '60000000',
			'keuangan_pre_financing' => '0',
			'status_pekerjaan' => 'proyek masih berjalan, tidak ada masalah',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '0',
			'persentase_progres_bulan_3' => '0',
			'persentase_progres_bulan_4' => '0',
			'persentase_progres_bulan_5' => '0',
			'persentase_progres_bulan_6' => '0',
			'persentase_progres_bulan_7' => '0',
			'persentase_progres_bulan_8' => '0',
			'persentase_progres_bulan_9' => '0',
			'persentase_progres_bulan_10' => '0',
			'persentase_progres_bulan_11' => '0',
			'persentase_progres_bulan_12' => '0',
			'persentase_progres_proyek' => '10',
		]);
	}

}