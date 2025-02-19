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
        Schema::create('istaknuto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('predstava_id')->unsigned();
            $table->foreign('predstava_id')->references('id')->on('predstava')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
