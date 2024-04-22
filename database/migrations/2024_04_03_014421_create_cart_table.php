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
            $table->string('phone')->nullable();
            $table->string('linkFacebook')->nullable();
            $table->string('email')->nullable()->validate(['email' => 'email']);
            $table->string('codeGroup')->nullable();
            $table->string('nameGroup')->nullable();
            $table->tinyInteger('idGroup');
            $table->double('price')->default(0)->nullable(); //giá bán
            $table->double('rent_cost')->default(0)->nullable(); //giá thuê
            $table->tinyInteger('status')->default(0); // 0 chưa duyện, 1 đã duyệt
            $table->tinyInteger('status_type')->default(0); // 0 mua, 1 thuê
            $table->string('linkGroup')->nullable();
            $table->string('timeCreate'); // ngày thuê, ngày mua
            $table->longText('note')->default()->nullable(); //chi tiết
            $table->string('user_create')->nullable(); // người tạo
            $table->string('user_email_create')->nullable(); // email người tạo
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
