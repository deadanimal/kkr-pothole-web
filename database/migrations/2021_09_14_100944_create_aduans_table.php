<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('kategori_jalan')->nullable();
            $table->string('daerah')->nullable();
            $table->string('negeri')->nullable();
            $table->string('poskod')->nullable();
            $table->string('status')->nullable();
            $table->string('lokasi')->nullable(); // GeoJSON
            $table->foreignId('gambar_id')->nullable();
            $table->foreignId('pengadu_id')->nullable();
            $table->foreignId('pihak_bertanggungjawap_id')->nullable();
            $table->string('kod_status')->nullable();
            $table->string('sispaa_id')->nullable();
            $table->string('penerangan_status')->nullable();
            $table->text('nota')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aduans');
    }
}
