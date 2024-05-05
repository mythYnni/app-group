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
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable(false);
            $table->string('image')->nullable(false);
            $table->string('name')->nullable(false);
            $table->tinyInteger('typeBlog')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->longText('detail')->default()->nullable(); //chi tiết
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
        Schema::dropIfExists('blog');
    }
};
