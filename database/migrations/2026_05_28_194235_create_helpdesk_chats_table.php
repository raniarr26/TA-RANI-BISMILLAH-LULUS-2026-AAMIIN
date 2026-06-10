<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create(
        'helpdesk_chats',
        function (
        Blueprint $table
        ) {

            $table->id();

            $table->unsignedBigInteger(
                'helpdesk_id'
            );

            $table->string(
                'sender'
            );

            $table->text(
                'message'
            );

            $table->timestamps();

        });

    }

    public function down(): void
    {

        Schema::dropIfExists(
            'helpdesk_chats'
        );

    }

};