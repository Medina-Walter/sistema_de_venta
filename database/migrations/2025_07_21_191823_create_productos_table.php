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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->foreignId('categorias_id')->constrained('categorias');
            $table->string('nombre', 255);
            $table->string('descripcion', 255)->nullable();
            $table->integer('cantidad')->default(0);
            $table->float('precio_compra')->default(0);
            $table->float('precio_venta')->default(0);
            $table->boolean('activo')->default(true);
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
