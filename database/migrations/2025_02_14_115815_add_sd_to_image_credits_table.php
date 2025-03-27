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
            $table->integer('sd_photo_studio_reimagine')->default(3);
            $table->integer('sd_photo_studio_inpaint')->default(3);
            $table->integer('sd_photo_studio_search_replace')->default(4);
            $table->integer('sd_photo_studio_outpaint')->default(4);
            $table->integer('sd_photo_studio_erase_object')->default(3);
            $table->integer('sd_photo_studio_remove_background')->default(2);
            $table->integer('sd_photo_studio_structure')->default(3);
            $table->integer('sd_photo_studio_sketch')->default(3);
            $table->integer('sd_photo_studio_creative_upscaler')->default(25);
            $table->integer('sd_photo_studio_conservative_upscaler')->default(25);
            $table->integer('sd_photo_studio_text')->default(1);
            $table->integer('sd_photo_studio_style')->default(4);
            $table->integer('sd_photo_studio_3d')->default(1);  
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
            $table->dropColumn('sd_photo_studio_reimagine');
            $table->dropColumn('sd_photo_studio_inpaint');
            $table->dropColumn('sd_photo_studio_search_replace');
            $table->dropColumn('sd_photo_studio_outpaint');
            $table->dropColumn('sd_photo_studio_erase_object');
            $table->dropColumn('sd_photo_studio_remove_background');
            $table->dropColumn('sd_photo_studio_structure');
            $table->dropColumn('sd_photo_studio_sketch');
            $table->dropColumn('sd_photo_studio_creative_upscaler');
            $table->dropColumn('sd_photo_studio_conservative_upscaler');
            $table->dropColumn('sd_photo_studio_text');
            $table->dropColumn('sd_photo_studio_style');
            $table->dropColumn('sd_photo_studio_3d');              
        });
    }
};
