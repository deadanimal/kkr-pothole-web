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
            $table->string('title')->nullable();
            $table->text('detail')->nullable();
            $table->string('kategori_jalan')->nullable();
            $table->string('daerah')->nullable();
            $table->string('negeri')->nullable();
            $table->string('poskod')->nullable();
            $table->string('status')->nullable();
            $table->string('latitud')->nullable();
            $table->string('langitud')->nullable(); // GeoJSON
            $table->foreignId('gambar_id')->nullable();
            $table->foreignId('pengadu_id')->nullable();
            $table->foreignId('response_code')->nullable();
            $table->string('status_code')->nullable();
            $table->string('sispaa_id')->nullable();
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
