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
        Schema::table('main_settings', function (Blueprint $table) {
            $table->boolean('youtube_feature')->nullable()->default(0);
            $table->string('youtube_api')->nullable();
            $table->boolean('youtube_feature_free_tier')->nullable()->default(0);
            $table->boolean('rss_feature')->nullable()->default(0);
            $table->boolean('rss_feature_free_tier')->nullable()->default(0);
            $table->integer('gpt_4o_mini_credits')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_settings', function (Blueprint $table) {
            $table->dropColumn('youtube_feature');
            $table->dropColumn('youtube_api');
            $table->dropColumn('youtube_feature_free_tier');
            $table->dropColumn('rss_feature');
            $table->dropColumn('rss_feature_free_tier');
            $table->dropColumn('gpt_4o_mini_credits');
        });
    }
};
