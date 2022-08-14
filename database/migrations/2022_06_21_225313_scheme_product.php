<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->bigInteger('fd_pid');
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->decimal('fd_amount',8,2);
            $table->double('fd_price',8,2);
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->index(['fd_pid','fd_code'],'pd_index');
        });
        Schema::create('tb_product_status', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->bigInteger('fd_pid');
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->tinyInteger('fd_status');
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->index(['fd_pid','fd_code'],'pd_status_index');
        });
        Schema::create('tb_history', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->bigInteger('fd_pid');
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->decimal('fd_amount',8,2);
            $table->double('fd_price',8,2);
            $table->tinyInteger('fd_status');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->index(['fd_pid','fd_created_datetime'],'ht_index');
        });
        Schema::create('tb_saler', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->bigInteger('fd_pid');
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->string('fd_phone',16);
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->index(['fd_phone','fd_name'],'sl_index');
            $table->index(['fd_pid','fd_code'],'sl_index2');
        });
        Schema::create('tb_admin', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->string('fd_username',16);
            $table->string('fd_password');
            $table->tinyInteger('fd_class');
            $table->json('fd_perimission');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->index(['fd_username','fd_class'],'ad_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_product');
        Schema::dropIfExists('tb_product_status');
        Schema::dropIfExists('tb_history');
        Schema::dropIfExists('tb_saler');
        Schema::dropIfExists('tb_admin');
    }
};
