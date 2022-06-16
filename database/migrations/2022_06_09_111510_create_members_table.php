<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('nama');
            $table->string('nisn');
            $table->string('tmpt_lahir');
            $table->string('tgl_lahir');
            $table->string('jns_kelamin');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jns_anggota');
            $table->string('nama_gambar');
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
};
