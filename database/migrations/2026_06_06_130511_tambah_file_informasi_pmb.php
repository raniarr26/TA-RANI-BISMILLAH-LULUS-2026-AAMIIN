<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    { Schema::table('informasi_pmb', function ($table) {
         $table->string('foto')->nullable();
          $table->string('file_pdf')->nullable(); 
          });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    { Schema::table('informasi_pmb', function ($table) {
         $table->dropColumn('foto'); 
         $table->dropColumn('file_pdf');
          }); 
    }
};
