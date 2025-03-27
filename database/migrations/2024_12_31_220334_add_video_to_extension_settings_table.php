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
            $table->string('video_video_falai_api')->nullable();
            $table->boolean('video_video_feature')->default(false);
            $table->boolean('video_video_free_tier')->default(false);
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
            $table->dropColumn('video_video_falai_api');
            $table->dropColumn('video_video_feature');
            $table->dropColumn('video_video_free_tier');
        });
    }
};
