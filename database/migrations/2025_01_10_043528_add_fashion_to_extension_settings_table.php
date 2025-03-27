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
        Schema::table('extension_settings', function (Blueprint $table) {
            $table->string('pebblely_fashion_api')->nullable();
            $table->boolean('pebblely_fashion_feature')->default(false);
            $table->boolean('pebblely_fashion_free_tier')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extension_settings', function (Blueprint $table) {
            $table->dropColumn('pebblely_fashion_api');
            $table->dropColumn('pebblely_fashion_feature');
            $table->dropColumn('pebblely_fashion_free_tier');
        });
    }
};
