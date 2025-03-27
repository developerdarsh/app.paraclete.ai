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
        Schema::table('image_credits', function (Blueprint $table) {
            $table->integer('kling_15_video')->nullable()->default(1);
            $table->integer('haiper_2_video')->nullable()->default(1);
            $table->integer('minimax_video')->nullable()->default(1);
            $table->integer('mochi_1_video')->nullable()->default(1);
            $table->integer('luma_dream_machine_video')->nullable()->default(1);
            $table->integer('hunyuan_video')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_credits', function (Blueprint $table) {
            $table->dropColumn('kling_15_video');
            $table->dropColumn('haiper_2_video');
            $table->dropColumn('minimax_video');
            $table->dropColumn('mochi_1_video');
            $table->dropColumn('luma_dream_machine_video');
            $table->dropColumn('hunyuan_video');
        });
    }
};
