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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_member')->unique()->default(NULL);
            $table->string('marking_kode')->nullable()->default(NULL);
            $table->string('fullname');
            $table->string('username')->unique()->nullable()->default(NULL);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_whatsapp',15)->nullable()->default(NULL);
            $table->string('kota', 100)->nullable()->default(NULL);
            $table->string('kota_ws', 100)->nullable()->default(NULL);
            $table->string('usaha', 100)->nullable()->default(NULL);
            $table->string('role')->default('USER');
            $table->string('status')->default('NONAKTIF');
            // $table->string('photo_profile')->nullable();
            // $table->string('photo_outlet')->nullable();
            // $table->string('nama_outlet')->nullable();
            // $table->string('jumllah_cabang')->nullable();
            // $table->string('jumllah_karyawan')->nullable();
            // $table->string('omset')->nullable();
            // $table->string('franchise')->nullable();
            // $table->string('berdiri')->nullable();
            // $table->string('alamat')->nullable();
            // $table->string('harga_saham')->nullable();
            // $table->string('sisa_saham')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
