<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['banner', 'splash']);
            $table->string('image_path');
            $table->string('text');
            $table->text('description')->nullable();
            $table->string('link_path')->nullable();
            $table->string('link_text')->nullable();
            $table->enum('link_type', ['link', 'custom'])->default('link');
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
        Schema::dropIfExists('app_settings');
    }
}
