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
    {
        Schema::create('vulnerabilidades', function (Blueprint $table) {
            $table->id();
            $table->string('cve_id')->unique();
            $table->string('nombre_vulnerabilidad')
            $table->text('descripcion');
            $table->float('CVSSP')->nullable();
            $table->string('criticidad')->nullable();               
            $table->text('solucion')->nullable();
            $table->text('referencias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vulnerabilidades');
    }
};
