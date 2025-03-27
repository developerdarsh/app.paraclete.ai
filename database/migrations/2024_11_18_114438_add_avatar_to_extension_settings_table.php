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
            $table->string('heygen_api')->nullable();
            $table->boolean('heygen_avatar_feature')->nullable()->default(0);
            $table->boolean('heygen_avatar_free_tier')->nullable()->default(0);
            $table->boolean('heygen_avatar_video')->nullable()->default(0);
            $table->boolean('heygen_avatar_image')->nullable()->default(0);
            $table->integer('heygen_avatar_video_numbers')->nullable()->default(0);
            $table->integer('heygen_avatar_image_numbers')->nullable()->default(0);
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
            $table->dropColumn('heygen_api');
            $table->dropColumn('heygen_avatar_feature');
            $table->dropColumn('heygen_avatar_free_tier');
            $table->dropColumn('heygen_avatar_video');
            $table->dropColumn('heygen_avatar_image');
            $table->dropColumn('heygen_avatar_video_numbers');
            $table->dropColumn('heygen_avatar_image_numbers');
        });
    }
};
