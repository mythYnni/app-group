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
        Schema::create('banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable(false);
            $table->string('image')->nullable(false);
            $table->string('link')->nullable(false);
            $table->string('name')->nullable(false);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('status_type')->default(0);
            $table->string('timeCreate');
            // $table->string('iconText')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
