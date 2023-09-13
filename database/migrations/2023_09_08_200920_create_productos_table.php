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
            $table->string('name');
            $table->float('precio_mx');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('codigo_proveedor');
            $table->string('proveedor');
            $table->float('precio_proveedor');
            $table->string('img_path')->nullable()->default('Question-mark.jpg');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
