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
        Schema::create('glumi_u_predstavi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('predstava_id')->unsigned();
            $table->unsignedBigInteger('glumac_id')->unsigned();
            $table->foreign('predstava_id')->references('id')->on('predstava')->onDelete('cascade');
            $table->foreign('glumac_id')->references('id')->on('glumci')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glumi_u_predstavi');
    }
};
