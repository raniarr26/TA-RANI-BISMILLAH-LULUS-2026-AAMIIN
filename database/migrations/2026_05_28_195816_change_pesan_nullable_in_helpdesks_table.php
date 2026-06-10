<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::table(
        'helpdesks',
        function (
        Blueprint $table
        ) {

            $table->text('pesan')
            ->nullable()
            ->change();

        });

    }

    public function down(): void
    {

        Schema::table(
        'helpdesks',
        function (
        Blueprint $table
        ) {

            $table->text('pesan')
            ->nullable(false)
            ->change();

        });

    }

};