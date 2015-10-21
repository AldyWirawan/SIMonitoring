<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelProyek extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyek', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_uuk')->unsigned();
			$table->foreign('id_uuk')->references('id')->on('UUK');
			$table->string('nama_uuk');
			$table->string('pin');
			$table->date('tanggal_catat');
			$table->string('nama_pekerjaan');
			$table->string('nama_pemberi_kerja');
			$table->string('nama_ketua_pelaksana');
			$table->date('kontrak_tanggal');
			$table->string('kontrak_nomor');
			$table->date('kontrak_akhir_periode');
			$table->double('kontrak_nilai_euro');
			$table->double('kontrak_nilai_jpy');
			$table->double('kontrak_nilai_dollar');
			$table->double('kontrak_nilai_rupiah');
			$table->double('kontrak_nilai_total');
			$table->double('keuangan_invoice_total');
			$table->double('keuangan_sisa_invoice_total');
			$table->double('keuangan_usulan_penghapusan_proyek');
			$table->double('keuangan_total_realisasi');
			$table->double('keuangan_pre_financing');
			$table->double('keuangan_pendapatan');
			$table->double('keuangan_laba');
			$table->double('keuangan_dividen');
			$table->string('status_pekerjaan');
			$table->float('persentase_progres_bulan_1');
			$table->float('persentase_progres_bulan_2');
			$table->float('persentase_progres_bulan_3');
			$table->float('persentase_progres_bulan_4');
			$table->float('persentase_progres_bulan_5');
			$table->float('persentase_progres_bulan_6');
			$table->float('persentase_progres_bulan_7');
			$table->float('persentase_progres_bulan_8');
			$table->float('persentase_progres_bulan_9');
			$table->float('persentase_progres_bulan_10');
			$table->float('persentase_progres_bulan_11');
			$table->float('persentase_progres_bulan_12');
			$table->float('persentase_progres_proyek');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proyek');
	}

}
