<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->text('description')->nullable();
            $table->string('location')->required();
            $table->string('address')->nullable();
            $table->string('email')->required();
            $table->string('phone')->required()->unique();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_stores');
    }
}
