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
        Schema::create('busines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('busines_users_id')->nullable();
            $table->string('foto1')->nullable()->default(NULL);
            $table->string('foto2')->nullable()->default(NULL);
            $table->string('foto3')->nullable()->default(NULL);
            $table->string('foto4')->nullable()->default(NULL);
            $table->string('foto5')->nullable()->default(NULL);
            $table->string('foto6')->nullable()->default(NULL);
            $table->string('vidio_yt')->nullable()->default(NULL);
            $table->string('nama_outlet')->nullable()->default(NULL);
            $table->string('alamat')->nullable()->default(NULL);
            $table->string('kota')->nullable()->default(NULL);
            $table->string('waktu_bep')->nullable()->default(NULL);
            $table->string('estimasi_bep')->nullable()->default(NULL);
            $table->string('proposal')->nullable()->default(NULL);
            $table->string('total_saham')->nullable()->default(NULL);
            $table->string('harga_saham')->nullable()->default(NULL);
            $table->string('saham_terjual')->nullable()->default(NULL);

            $table->softDeletes();
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
        Schema::dropIfExists('busines');
    }
};
