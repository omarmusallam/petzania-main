<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_additional')->default(0);
            $table->string('name', 191);
            $table->text('description', 191)->nullable();
            $table->text('details', 191)->nullable();
            $table->json('type_atribute')->nullable();
            $table->string('image', 191)->nullable();
            $table->double('price')->default(0);
            $table->integer('views')->default(0);
            $table->enum('type',['grooming', 'trainig','transportaion','daycare'])->nullable();
            $table->tinyInteger('featured')->default(0);
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
        Schema::dropIfExists('services');
    }
};
