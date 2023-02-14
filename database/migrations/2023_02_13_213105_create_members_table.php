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
            $table->string('avatar')->nullable();
            $table->string('status',30)->index();
            $table->integer('code')->unique()->index();
            $table->integer('point');
            $table->integer('nik')->index();
            $table->string('ktp_name');
            $table->string('ktp_img');
            $table->string('ktp_gender',1);
            $table->date('ktp_dob');
            $table->text('ktp_address');
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
