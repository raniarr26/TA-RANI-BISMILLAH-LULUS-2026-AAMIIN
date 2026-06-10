
<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::table(
        'jalurs',
        function (
        Blueprint $table
        ) {

            $table->text(
                'deskripsi'
            )->nullable();

            $table->text(
                'persyaratan'
            )->nullable();

            $table->text(
                'mekanisme'
            )->nullable();

        });

    }

    public function down(): void
    {

        Schema::table(
        'jalurs',
        function (
        Blueprint $table
        ) {

            $table->dropColumn([
                'deskripsi',
                'persyaratan',
                'mekanisme'
            ]);

        });

    }

};