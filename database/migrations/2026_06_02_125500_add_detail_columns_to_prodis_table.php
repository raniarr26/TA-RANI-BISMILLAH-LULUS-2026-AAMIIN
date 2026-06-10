<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::table(
        'prodis',
        function (
        Blueprint $table
        ) {

            $table->text(
                'akreditasi'
            )->nullable();

            $table->text(
                'tentang_prodi'
            )->nullable();

            $table->text(
                'profil_lulusan'
            )->nullable();

            $table->text(
                'lainnya'
            )->nullable();

        });

    }

    public function down(): void
    {

        Schema::table(
        'prodis',
        function (
        Blueprint $table
        ) {

            $table->dropColumn([
                'akreditasi',
                'tentang_prodi',
                'profil_lulusan',
                'lainnya'
            ]);

        });

    }

};