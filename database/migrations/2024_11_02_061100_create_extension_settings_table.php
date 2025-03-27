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
        Schema::create('extension_settings', function (Blueprint $table) {
            $table->id();
            $table->string('plagiarism_api')->nullable();
            $table->boolean('plagiarism_feature')->default(false);
            $table->boolean('plagiarism_free_tier')->default(false);
            $table->boolean('detector_feature')->default(false);
            $table->boolean('detector_free_tier')->default(false);
            $table->string('flux_api')->nullable();
            $table->string('pebblely_api')->nullable();
            $table->boolean('pebblely_feature')->default(false);
            $table->boolean('pebblely_free_tier')->default(false);
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
        Schema::dropIfExists('extension_settings');
    }
};
