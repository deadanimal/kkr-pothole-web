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
            $table->string('name');
            $table->string('telefon');
            $table->string('email')->unique();
            $table->enum('role', ['pengadu', 'admin', 'super_admin'])->default('pengadu');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('modified_by')->nullable();
            $table->rememberToken();
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
