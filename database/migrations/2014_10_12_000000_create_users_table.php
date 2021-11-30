<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('doc_no')->nullable();
            $table->string('telefon')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['pengadu', 'admin', 'super_admin'])->default('pengadu');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('jawatan')->nullable();
            $table->foreignId('gambar_id')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('modified_by')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
