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
        Schema::create('buiding', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('idCart')->nullable(false);
            $table->string('code')->nullable(false);
            $table->string('code_group')->nullable(false);
            $table->string('name_account')->nullable(false);
            $table->string('phone')->nullable();
            $table->string('linkFacebook')->nullable();
            $table->string('email')->nullable()->validate(['email' => 'email']);
            $table->string('nameGroup')->nullable(false);
            $table->tinyInteger('idGroup');
            $table->double('price')->default(0)->nullable(); //giá bán
            $table->double('rent_cost')->default(0)->nullable(); //giá thuê
            $table->double('totail_price')->default(0)->nullable(); //tổng tiền
            $table->tinyInteger('status_type')->default(0); // 0 thuê, 1 mua
            $table->string('linkGroup')->nullable(false);
            $table->string('date')->nullable(); // ngày thuê, ngày mua tháng thue
            $table->string('time')->nullable(); // ngày thuê, ngày mua tháng thue
            $table->string('time_out')->nullable(); // ngày thuê, ngày mua tháng thue
            $table->string('timeCreate'); // ngày thuê, ngày mua
            $table->longText('note')->default()->nullable(); //chi tiết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buiding');
    }
};
