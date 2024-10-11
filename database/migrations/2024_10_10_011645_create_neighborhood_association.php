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
        Schema::create('neighborhood_association', function (Blueprint $table) {
            $table->id();
            $table->string('neighborhood_proof_photo')->nullable(); // asociacion de vecino
            $table->boolean('approved')->default(false);
            $table->timestamps();

            // Clave foránea que referencia a la tabla profiles
            $table->unsignedBigInteger('profile_id'); // Relación con profiles
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhood_association');
    }
};
