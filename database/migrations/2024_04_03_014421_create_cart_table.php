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
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_account')->nullable(false);
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable()->validate(['email' => 'email']);
            $table->string('nameGroup')->nullable(false);
            $table->unsignedBigInteger('idGroup');
            $table->foreign('idGroup')->references('id')->on('group')->onDelete('cascade');
            $table->double('price')->default(0)->nullable(); //giá bán
            $table->double('rent_cost')->default(0)->nullable(); //giá thuê
            $table->tinyInteger('status')->default(0); // 0 chưa duyện, 1 đã duyệt
            $table->tinyInteger('status_type')->default(0); // 0 mua, 1 thuê
            $table->string('linkGroup')->nullable(false);
            $table->string('timeCreate'); // ngày thuê, ngày mua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
