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
            $table->integer('kling_21_standard_video_image')->nullable()->default(1);
            $table->integer('kling_21_pro_video_image')->nullable()->default(1);
            $table->integer('kling_21_master_video_image')->nullable()->default(1);
            $table->integer('google_veo3_video_image')->nullable()->default(1);
            $table->integer('google_veo3_video')->nullable()->default(1);
            $table->integer('google_veo2_video')->nullable()->default(1);
            $table->integer('kling_21_master_video')->nullable()->default(1);
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
            $table->dropColumn('kling_21_standard_video_image');
            $table->dropColumn('kling_21_pro_video_image');
            $table->dropColumn('kling_21_master_video_image');
            $table->dropColumn('google_veo3_video_image');
            $table->dropColumn('google_veo3_video');
            $table->dropColumn('google_veo2_video');
            $table->dropColumn('kling_21_master_video');
        });
    }
};
