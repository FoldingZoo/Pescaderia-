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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad');
            $table->string('imagen')->nullable();

            // 🔹 Nueva columna de relación con categorias
            $table->foreignId('categoria_id')
                  ->nullable() // permite valores nulos si el producto no tiene categoría aún
                  ->constrained('categorias') // referencia a la tabla categorias
                  ->nullOnDelete(); // si se borra la categoría, deja el campo en null

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
