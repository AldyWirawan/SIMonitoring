<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;

use App\UUK;
use App\Proyek;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');

		$this->call('UUKTableSeeder');

		$this->call('ProyekTableSeeder');

		$this->command->info('seeded!');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		User::create([
			'name'      => 'admin' ,
			'email'     => 'adminsimon@bpudl.itb.ac.id' ,
			'password'  => Hash::make('admin123') ,
			'role' 		=> 'admin'
		]);
		User::create([
			'name'      => 'uuka' ,
			'email'     => 'uuka@bpudl.itb.ac.id' ,
			'password'  => Hash::make('uuka') ,
			'role' 		=> '1'
		]);
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
		UUK::create([
			'nama_uuk' => 'UUK B',
			'waktu_didirikan' => '2015',
			'kepemilikan_ITB' => '50%',
			'penjabat' => 'Komisaris Utama : Prof. B',
			'alamat' => 'jalan segitiga',
		]);
		UUK::create([
			'nama_uuk' => 'UUK C',
			'waktu_didirikan' => '2015',
			'kepemilikan_ITB' => '60%',
			'penjabat' => 'Komisaris Utama : Prof. C',
			'alamat' => 'jalan kotak',
		]);
		UUK::create([
			'nama_uuk' => 'UUK D',
			'waktu_didirikan' => '2015',
			'kepemilikan_ITB' => '75%',
			'penjabat' => 'Komisaris Utama : Prof. D',
			'alamat' => 'jalan tabung',
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
			'keuangan_pendapatan' => '500000000',
			'keuangan_laba' => '200000000',
			'keuangan_dividen' => '50000000',
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
		Proyek::create([
			'id_uuk' => $UUK[0]->id,
			'nama_uuk' => UUK::find($UUK[0]->id)->nama_uuk,
			'pin' => 'P1121',
			'tanggal_catat' => $tanggal_catat,
			'nama_pekerjaan' => 'proyek AB',
			'nama_pemberi_kerja' => 'PT. maju sejahtera',
			'nama_ketua_pelaksana' => 'John Doe',
			'kontrak_tanggal' => $kontrak_tanggal,
			'kontrak_nomor' => '123/AB/CDEFG/Z/2015',
			'kontrak_akhir_periode' => $kontrak_akhir_periode,
			'kontrak_nilai_euro' => '0',
			'kontrak_nilai_jpy' => '0',
			'kontrak_nilai_dollar' => '0',
			'kontrak_nilai_rupiah' => '200000000',
			'kontrak_nilai_total' => '200000000',
			'keuangan_invoice_total' => '30000000',
			'keuangan_sisa_invoice_total' => '200000000',
			'keuangan_usulan_penghapusan_proyek' => '0',
			'keuangan_total_realisasi' => '50000000',
			'keuangan_pre_financing' => '0',
			'keuangan_pendapatan' => '200000000',
			'keuangan_laba' => '100000000',
			'keuangan_dividen' => '20000000',
			'status_pekerjaan' => 'proyek selesai',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '20',
			'persentase_progres_bulan_3' => '50',
			'persentase_progres_bulan_4' => '60',
			'persentase_progres_bulan_5' => '80',
			'persentase_progres_bulan_6' => '85',
			'persentase_progres_bulan_7' => '100',
			'persentase_progres_bulan_8' => '0',
			'persentase_progres_bulan_9' => '0',
			'persentase_progres_bulan_10' => '0',
			'persentase_progres_bulan_11' => '0',
			'persentase_progres_bulan_12' => '0',
			'persentase_progres_proyek' => '100',
		]);
		Proyek::create([
			'id_uuk' => $UUK[1]->id,
			'nama_uuk' => UUK::find($UUK[1]->id)->nama_uuk,
			'pin' => 'P1112',
			'tanggal_catat' => $tanggal_catat,
			'nama_pekerjaan' => 'proyek B',
			'nama_pemberi_kerja' => 'PT. mundur sejahtera',
			'nama_ketua_pelaksana' => 'Johnny Dew',
			'kontrak_tanggal' => $kontrak_tanggal,
			'kontrak_nomor' => '345/AB/CDEFG/Z/2015',
			'kontrak_akhir_periode' => $kontrak_akhir_periode,
			'kontrak_nilai_euro' => '0',
			'kontrak_nilai_jpy' => '0',
			'kontrak_nilai_dollar' => '100000',
			'kontrak_nilai_rupiah' => '200000000',
			'kontrak_nilai_total' => '300000000',
			'keuangan_invoice_total' => '50000000',
			'keuangan_sisa_invoice_total' => '100000000',
			'keuangan_usulan_penghapusan_proyek' => '0',
			'keuangan_total_realisasi' => '60000000',
			'keuangan_pre_financing' => '0',
			'keuangan_pendapatan' => '100000000',
			'keuangan_laba' => '50000000',
			'keuangan_dividen' => '5000000',
			'status_pekerjaan' => 'proyek masih berjalan, tidak ada masalah',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '20',
			'persentase_progres_bulan_3' => '30',
			'persentase_progres_bulan_4' => '0',
			'persentase_progres_bulan_5' => '0',
			'persentase_progres_bulan_6' => '0',
			'persentase_progres_bulan_7' => '0',
			'persentase_progres_bulan_8' => '0',
			'persentase_progres_bulan_9' => '0',
			'persentase_progres_bulan_10' => '0',
			'persentase_progres_bulan_11' => '0',
			'persentase_progres_bulan_12' => '0',
			'persentase_progres_proyek' => '30',
		]);
		Proyek::create([
			'id_uuk' => $UUK[2]->id,
			'nama_uuk' => UUK::find($UUK[2]->id)->nama_uuk,
			'pin' => 'P1113',
			'tanggal_catat' => $tanggal_catat,
			'nama_pekerjaan' => 'proyek C',
			'nama_pemberi_kerja' => 'PT. maju mundur',
			'nama_ketua_pelaksana' => 'Dow Johnson',
			'kontrak_tanggal' => $kontrak_tanggal,
			'kontrak_nomor' => '456/AB/CDEFG/Z/2015',
			'kontrak_akhir_periode' => $kontrak_akhir_periode,
			'kontrak_nilai_euro' => '0',
			'kontrak_nilai_jpy' => '1000',
			'kontrak_nilai_dollar' => '0',
			'kontrak_nilai_rupiah' => '100000000',
			'kontrak_nilai_total' => '100300000',
			'keuangan_invoice_total' => '50000000',
			'keuangan_sisa_invoice_total' => '100000000',
			'keuangan_usulan_penghapusan_proyek' => '0',
			'keuangan_total_realisasi' => '70000000',
			'keuangan_pre_financing' => '0',
			'keuangan_pendapatan' => '1000000000',
			'keuangan_laba' => '500000000',
			'keuangan_dividen' => '12500000',
			'status_pekerjaan' => 'proyek terhambat',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '20',
			'persentase_progres_bulan_3' => '20',
			'persentase_progres_bulan_4' => '20',
			'persentase_progres_bulan_5' => '20',
			'persentase_progres_bulan_6' => '0',
			'persentase_progres_bulan_7' => '0',
			'persentase_progres_bulan_8' => '0',
			'persentase_progres_bulan_9' => '0',
			'persentase_progres_bulan_10' => '0',
			'persentase_progres_bulan_11' => '0',
			'persentase_progres_bulan_12' => '0',
			'persentase_progres_proyek' => '20',
		]);
		Proyek::create([
			'id_uuk' => $UUK[3]->id,
			'nama_uuk' => UUK::find($UUK[3]->id)->nama_uuk,
			'pin' => 'P1114',
			'tanggal_catat' => $tanggal_catat,
			'nama_pekerjaan' => 'proyek D',
			'nama_pemberi_kerja' => 'PT. sejahtera selalu',
			'nama_ketua_pelaksana' => 'Ode John',
			'kontrak_tanggal' => $kontrak_tanggal,
			'kontrak_nomor' => '321/AB/CDEFG/Z/2015',
			'kontrak_akhir_periode' => $kontrak_akhir_periode,
			'kontrak_nilai_euro' => '0',
			'kontrak_nilai_jpy' => '0',
			'kontrak_nilai_dollar' => '0',
			'kontrak_nilai_rupiah' => '50000000',
			'kontrak_nilai_total' => '50000000',
			'keuangan_invoice_total' => '5000000',
			'keuangan_sisa_invoice_total' => '10000000',
			'keuangan_usulan_penghapusan_proyek' => '0',
			'keuangan_total_realisasi' => '5000000',
			'keuangan_pre_financing' => '0',
			'keuangan_pendapatan' => '500000000',
			'keuangan_laba' => '200000000',
			'keuangan_dividen' => '50000000',
			'status_pekerjaan' => 'proyek sedikit terhambat',
			'persentase_progres_bulan_1' => '10',
			'persentase_progres_bulan_2' => '15',
			'persentase_progres_bulan_3' => '20',
			'persentase_progres_bulan_4' => '20',
			'persentase_progres_bulan_5' => '25',
			'persentase_progres_bulan_6' => '0',
			'persentase_progres_bulan_7' => '0',
			'persentase_progres_bulan_8' => '0',
			'persentase_progres_bulan_9' => '0',
			'persentase_progres_bulan_10' => '0',
			'persentase_progres_bulan_11' => '0',
			'persentase_progres_bulan_12' => '0',
			'persentase_progres_proyek' => '25',
		]);
	}

}