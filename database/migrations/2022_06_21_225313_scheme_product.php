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
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->double('fd_amount',8,2);
            $table->double('fd_price',8,2);
            $table->tinyInteger('fd_status')->default(1);
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->unique(['fd_code','fd_name'],'pd_index');
        });
        Schema::create('tb_history', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->string('fd_pid',64);
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->double('fd_amount',8,2);
            $table->double('fd_price',8,2);
            $table->date('fd_expired_datetime');
            $table->string('fd_seller_name',64);
            $table->string('fd_by',16);
            $table->tinyInteger('fd_action');
            $table->tinyInteger('fd_status')->default(1);
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->unique(['fd_pid','fd_code','fd_name','fd_type','fd_status'],'ht_index');
        });
        Schema::create('tb_expired', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->string('fd_code',64);
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->double('fd_amount',8,2);
            $table->date('fd_expired_datetime');
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->unique(['fd_code'],'exp_index');
        });
        Schema::create('tb_seller', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->string('fd_name',64);
            $table->string('fd_type',32);
            $table->string('fd_phone',16);
            $table->timestampTz('fd_updated_datetime');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->unique(['fd_phone','fd_name','fd_type'],'sl_index');
        });
        Schema::create('tb_admin', function (Blueprint $table) {
            // CREATE TABLE
            $table->bigIncrements('fd_id');
            $table->string('fd_username',16);
            $table->string('fd_password');
            $table->tinyInteger('fd_class');
            $table->json('fd_permission');
            $table->timestampTz('fd_created_datetime');
            // INDEX CONFIG
            $table->unique(['fd_username','fd_password','fd_class'],'ad_index');
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
        Schema::dropIfExists('tb_history');
        schema::dropIfExists('tb_expired');
        Schema::dropIfExists('tb_seller');
        Schema::dropIfExists('tb_admin');
    }
};
