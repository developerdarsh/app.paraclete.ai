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
            $table->dropColumn('dalle_image_engine');
            $table->dropColumn('sd_image_engine');
            $table->dropColumn('dalle_images');
            $table->dropColumn('sd_images');
            $table->dropColumn('images');
            $table->dropColumn('words');
            $table->integer('image_credits')->nullable()->default(0);
            $table->text('image_vendors')->nullable();
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
            $table->string('dalle_image_engine')->nullable();
            $table->string('sd_image_engine')->nullable();
            $table->integer('dalle_images')->nullable()->default(0);
            $table->integer('sd_images')->nullable()->default(0);
            $table->integer('words')->default(0);
            $table->integer('images')->default(0);
            $table->dropColumn('image_credits');
            $table->dropColumn('image_vendors');
        });
    }
};
