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
            $table->string('video_text_falai_api')->nullable();
            $table->boolean('video_text_feature')->default(false);
            $table->boolean('video_text_free_tier')->default(false);
            $table->integer('video_text_credits_per_video')->nullable()->default(1);
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
            $table->dropColumn('video_text_falai_api');
            $table->dropColumn('video_text_feature');
            $table->dropColumn('video_text_free_tier');
            $table->dropColumn('video_text_credits_per_video');
        });
    }
};
