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
            $table->string('voice_clone_elevenlabs_api')->nullable();
            $table->boolean('voice_clone_feature')->default(false);
            $table->boolean('voice_clone_free_tier')->default(false);
            $table->integer('voice_clone_limit')->nullable()->default(0);
            $table->boolean('sound_studio_feature')->default(false);
            $table->boolean('sound_studio_free_tier')->default(false);
            $table->integer('sound_studio_max_merge_files')->nullable()->default(1);
            $table->integer('sound_studio_max_audio_size')->nullable()->default(1);
            $table->string('photo_studio_stability_api')->nullable();
            $table->boolean('photo_studio_feature')->default(false);
            $table->boolean('photo_studio_free_tier')->default(false);
            $table->string('video_image_stability_api')->nullable();
            $table->boolean('video_image_feature')->default(false);
            $table->boolean('video_image_free_tier')->default(false);
            $table->integer('video_image_credits_per_video')->nullable()->default(1);
            $table->boolean('integration_wordpress_feature')->default(false);
            $table->boolean('integration_wordpress_free_tier')->default(false);
            $table->boolean('integration_wordpress_auto_post')->default(false);
            $table->integer('integration_wordpress_website_numbers')->nullable()->default(1);
            $table->integer('integration_wordpress_post_numbers')->nullable()->default(1);
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
            $table->dropColumn('voice_clone_elevenlabs_api');
            $table->dropColumn('voice_clone_feature');
            $table->dropColumn('voice_clone_free_tier');
            $table->dropColumn('voice_clone_limit');
            $table->dropColumn('sound_studio_feature');
            $table->dropColumn('sound_studio_free_tier');
            $table->dropColumn('sound_studio_max_merge_files');
            $table->dropColumn('sound_studio_max_audio_size');
            $table->dropColumn('photo_studio_stability_api');
            $table->dropColumn('photo_studio_feature');
            $table->dropColumn('photo_studio_free_tier');
            $table->dropColumn('video_image_stability_api');
            $table->dropColumn('video_image_feature');
            $table->dropColumn('video_image_free_tier');
            $table->dropColumn('video_image_credits_per_video');
            $table->dropColumn('integration_wordpress_feature');
            $table->dropColumn('integration_wordpress_free_tier');
            $table->dropColumn('integration_wordpress_auto_post');
            $table->dropColumn('integration_wordpress_website_numbers');
            $table->dropColumn('integration_wordpress_post_numbers');
        });
    }
};
