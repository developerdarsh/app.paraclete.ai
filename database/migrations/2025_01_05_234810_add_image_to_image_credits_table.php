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
            $table->integer('kling_15_video_image')->nullable()->default(1);
            $table->integer('haiper_2_video_image')->nullable()->default(1);
            $table->integer('luma_dream_machine_video_image')->nullable()->default(1);
            $table->integer('stable_diffusion_video_image')->nullable()->default(1);
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
            $table->dropColumn('kling_15_video_image');
            $table->dropColumn('haiper_2_video_image');
            $table->dropColumn('luma_dream_machine_video_image');
            $table->dropColumn('stable_diffusion_video_image');
        });
    }
};
