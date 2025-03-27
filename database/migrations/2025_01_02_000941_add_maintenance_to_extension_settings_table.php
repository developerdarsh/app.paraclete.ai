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
            $table->boolean('maintenance_feature')->default(false);
            $table->string('maintenance_banner')->nullable();
            $table->text('maintenance_header')->nullable();
            $table->text('maintenance_message')->nullable();
            $table->text('maintenance_footer')->nullable();
            $table->string('video_image_falai_api')->nullable();
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
            $table->dropColumn('maintenance_feature');
            $table->dropColumn('maintenance_banner');
            $table->dropColumn('maintenance_header');
            $table->dropColumn('maintenance_message');
            $table->dropColumn('maintenance_footer');
            $table->dropColumn('video_image_falai_api');
        });
    }
};
