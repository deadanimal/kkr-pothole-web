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
            $table->string('latitud')->nullable();
            $table->string('langitud')->nullable();
            $table->string('address')->nullable();
            $table->string('response_party')->nullable();
            $table->string('nama_jalan')->nullable();
            $table->string('pbt_code')->nullable();
            $table->string('complaint_type')->nullable();
            $table->string('complaint_category')->nullable();
            $table->string('complaint_category_code')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('status_code')->nullable();
            $table->string('status_desc')->nullable();
            $table->string('sispaa_id')->nullable();
            $table->text('nota')->nullable();
            $table->foreignId('gambar_id')->nullable();
            $table->foreignId('pengadu_id')->nullable();
            $table->string('response_code')->nullable();
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
