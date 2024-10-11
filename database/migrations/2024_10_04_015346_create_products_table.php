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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('description');
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();



            // $table->id(); // Campo 'id' como clave primaria
            // $table->string('name'); // Campo para el nombre del producto
            // $table->integer('stock'); // Campo para el stock
            // $table->integer('price'); // Campo para el precio
            // $table->text('description'); // Campo para la descripción
            // $table->timestamp('created_at')->useCurrent(); // Campo para created_at
            // $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Campo para updated_at
            // $table->timestamp('published_at')->nullable(); // Campo para published_at


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
