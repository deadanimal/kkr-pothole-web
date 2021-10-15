<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('detail')->nullable();
            $table->string('status')->nullable();
            $table->string('response_party')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('alamat')->nullable();
            $table->string('daerah')->nullable();
            $table->string('negeri')->nullable();
            $table->string('poskod')->nullable();
            $table->foreignId('admin_id')->nullable();
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
        Schema::dropIfExists('jalans');
    }
}
