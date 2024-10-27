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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ci', 'passport', 'rif', 'neighborhood_association'])->nullable();  // Ejemplo: tipo de documento (CI, Pasaporte, etc.)
            $table->integer('count')->nullable(); // Número cuantos documento hay
            $table->integer('number')->nullable(); // Número del documento
            $table->integer('RECEIPT_N')->nullable(); // N° COMPROBANTE
            $table->string('rif_url')->nullable(); // URL del RIF
            $table->string('taxDomicile')->nullable(); // domicilio fiscal
            $table->string('front_image')->nullable(); // Ruta de la imagen del frente
            $table->string('back_image')->nullable();  // Ruta de la imagen del reverso
            $table->date('issued_at')->nullable(); // Fecha de emisión
            $table->date('expires_at')->nullable(); // Fecha de expiración (si aplica)
            $table->boolean('approved')->default(false);// significa si el documento esta aprovado
            $table->boolean('status')->default(false);//significa que si esta activo o desactivado este documento si esta activo se muestra si no. no se muestra.
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
        Schema::dropIfExists('documents');
    }
};
