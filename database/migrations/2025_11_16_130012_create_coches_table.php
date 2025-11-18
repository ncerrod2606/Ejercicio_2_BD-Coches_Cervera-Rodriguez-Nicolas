<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('year');
            $table->string('color');
            $table->float('precio');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coches');
    }
};
