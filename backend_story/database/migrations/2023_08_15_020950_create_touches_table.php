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
        Schema::create('touches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('data');
            $table->unsignedInteger('text_id');
            $table->foreign('text_id')->references('id')->on('texts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touches');
    }
};
