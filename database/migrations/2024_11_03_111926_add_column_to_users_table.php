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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('available_words');
            $table->dropColumn('available_words_prepaid');
            $table->dropColumn('total_words');
            $table->dropColumn('total_dalle_images');
            $table->dropColumn('available_dalle_images');
            $table->dropColumn('available_dalle_images_prepaid');
            $table->dropColumn('total_sd_images');
            $table->dropColumn('available_sd_images');
            $table->dropColumn('available_sd_images_prepaid');
            $table->dropColumn('available_images');
            $table->dropColumn('available_images_prepaid');
            $table->dropColumn('total_images');
            $table->integer('image_credits')->default(0);
            $table->integer('image_credits_prepaid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('available_words')->default(0);
            $table->integer('available_words_prepaid')->default(0);
            $table->integer('total_words')->default(0);
            $table->integer('total_dalle_images')->default(0);
            $table->integer('available_dalle_images')->default(0);
            $table->integer('available_dalle_images_prepaid')->default(0);
            $table->integer('total_sd_images')->default(0);
            $table->integer('available_sd_images')->default(0);
            $table->integer('available_sd_images_prepaid')->default(0);
            $table->integer('available_images')->default(0);
            $table->integer('available_images_prepaid')->default(0);
            $table->integer('total_images')->default(0);
            $table->dropColumn('');
        });
    }
};
