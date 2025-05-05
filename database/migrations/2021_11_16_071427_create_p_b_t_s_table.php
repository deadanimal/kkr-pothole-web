<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePBTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_b_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('pbt_itegur_nama')->nullable();
            $table->string('pbt_itegur_kod')->nullable();
            $table->string('pbt_sispaa_nama')->nullable();
            $table->string('sispaa_org_id')->nullable();
            $table->string('nodus_sispaa')->nullable();
            $table->string('db_sispaa_nama')->nullable();
            $table->string('url_sispaa_acc')->nullable();
            $table->string('negeri')->nullable();
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
        Schema::dropIfExists('p_b_t_s');
    }
}
