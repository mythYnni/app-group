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
        Schema::create('group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nameGroup')->nullable(false);
            $table->string('linkGroup')->nullable(false);
            $table->string('name_user_group')->nullable(false);
            $table->string('account_group')->nullable(false);
            $table->string('image')->nullable(false);
            $table->string('administrator')->nullable(false);
            $table->string('account_group_week')->nullable(false);
            $table->string('blog_week')->nullable(false);
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('wards')->nullable();
            $table->string('detail_address')->nullable();
            $table->unsignedBigInteger('idCategory');
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->tinyInteger('type')->default(0); // 0 là riêng tư, 1 công khai
            $table->double('price')->default(0)->nullable(); //giá bán
            $table->double('rent_cost')->default(0)->nullable(); //giá thuê
            $table->tinyInteger('status')->default(0); // 0 hoạt động, 1 lưu trữ
            $table->tinyInteger('status_color')->default(0); // 0 đỏ, 1 vành, 2 xanh
            $table->tinyInteger('type_sale')->default(0); // 0 mặc định, 1 bán chạy, 2 tương tác nhiều
            $table->string('timeCreate'); // ngày tạo
            $table->longText('detail_group')->default(0); //chi tiết
            $table->string('user_create')->nullable();
            $table->string('user_email_create')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group');
    }
};
