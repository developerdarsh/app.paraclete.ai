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
            $table->boolean('wordpress_feature')->nullable()->default(0);
            $table->integer('wordpress_website_number')->nullable()->default(0);
            $table->integer('wordpress_post_number')->nullable()->default(0);
            $table->boolean('product_photo_feature')->nullable()->default(0);
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
            $table->dropColumn('wordpress_feature');
            $table->dropColumn('wordpress_website_number');
            $table->dropColumn('wordpress_post_number');
            $table->dropColumn('product_photo_feature');
        });
    }
};
