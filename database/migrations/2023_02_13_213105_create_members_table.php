<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->enum('status',['pending','regular','member','reject'])->default('pending')->nullable();
            $table->text('reason')->nullable();
            $table->integer('code')->nullable();
            $table->integer('point')->nullable();
            $table->string('nik')->unique()->index();
            $table->string('ktp_name');
            $table->string('ktp_img')->nullable();
            $table->enum('ktp_gender',['f','m'])->nullable();
            $table->string('ktp_dob')->nullable();
            $table->text('ktp_address')->nullable();
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
        Schema::dropIfExists('members');
    }
}
