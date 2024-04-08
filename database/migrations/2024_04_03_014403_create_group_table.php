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
            $table->string('code')->nullable(false);
            $table->string('nameGroup')->nullable(false);
            $table->string('slugGroup')->nullable(false);
            $table->string('linkGroup')->nullable(false);
            $table->string('category')->nullable(); // danh mục
            $table->json('name_user_group')->default()->nullable(false); // danh sách quản trị
            $table->string('image')->nullable(false); // ảnh nhóm
            $table->string('account_group')->nullable(false); // lượng thành viên
            $table->double('account_group_week')->nullable(false); // lượng thành viên vào trong tuần
            $table->double('account_group_blog')->nullable(false); // lượng bài viết / tuần
            $table->string('province')->nullable(); // tỉnh thành
            $table->string('district')->nullable(); // quận / huyện
            $table->string('wards')->nullable(); // xã / phường
            $table->unsignedBigInteger('idCategory'); // danh mục vị trí 
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->tinyInteger('type')->default(0); // 0 là riêng tư, 1 công khai
            $table->double('price')->default(0)->nullable(); //giá bán
            $table->double('rent_cost')->default(0)->nullable(); //giá thuê
            $table->tinyInteger('status')->default(0); // 0 hoạt động, 1 lưu trữ
            $table->tinyInteger('status_color')->default(0); // 0 đỏ, 1 vành, 2 xanh
            $table->tinyInteger('type_sale')->default(0); // 0 mặc định, 1 bán chạy, 2 tương tác nhiều
            $table->string('timeCreate'); // ngày tạo
            $table->longText('detail_group')->default()->nullable(); //chi tiết
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
        Schema::dropIfExists('group');
    }
};
