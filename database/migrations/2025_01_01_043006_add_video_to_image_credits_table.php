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
            $table->integer('video_upscaler_video_video')->nullable()->default(1);
            $table->integer('cogvideox_5b_video_video')->nullable()->default(1);
            $table->integer('animatediff_video_video')->nullable()->default(1);
            $table->integer('fast_animatediff_video_video')->nullable()->default(1);
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
            $table->dropColumn('video_upscaler_video_video');
            $table->dropColumn('cogvideox_5b_video_video');
            $table->dropColumn('animatediff_video_video');
            $table->dropColumn('fast_animatediff_video_video');
        });
    }
};
