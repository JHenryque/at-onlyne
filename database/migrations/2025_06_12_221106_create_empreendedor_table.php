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
        Schema::create('empreendedor', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('logo_marca', 200);
            $table->timestamps();
        });


        Schema::create('atendimento', function (Blueprint $table) {
            $table->foreignId('empreendedor_id')->nullable()->index();
            $table->string('name');
            $table->string('preco');
            $table->timestamps();
        });

        Schema::create('horario', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('empreendedor_id')->nullable()->index();
            $table->string('user_id')->nullable();
            $table->string('data_atendimento');
            $table->string('hora_atendimento');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('item_order', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('empreendedor_id')->nullable()->index();
            $table->string('plano');
            $table->string('preco');
            $table->timestamps();
        });

        Schema::create('order_pagamento', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('empreendedor_id')->nullable()->index();
            $table->enum('metodo_pagamento', ['cartao', 'pix', 'boleto','QRcode']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empreendedor');
        Schema::dropIfExists('atendimento');
        Schema::dropIfExists('horario');
        Schema::dropIfExists('item_order');
    }
};
