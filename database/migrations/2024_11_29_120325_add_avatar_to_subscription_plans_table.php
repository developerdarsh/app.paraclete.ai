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
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->boolean('avatar_feature')->nullable()->default(0);
            $table->boolean('avatar_video_feature')->nullable()->default(0);
            $table->boolean('avatar_image_feature')->nullable()->default(0);
            $table->integer('avatar_video_numbers')->nullable()->default(0);
            $table->integer('avatar_image_numbers')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn('avatar_feature');
            $table->dropColumn('avatar_video_feature');
            $table->dropColumn('avatar_image_feature');
            $table->dropColumn('avatar_video_numbers');
            $table->dropColumn('avatar_image_numbers');
        });
    }
};
