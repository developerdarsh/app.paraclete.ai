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
            $table->string('faceswap_piapi_api')->nullable();
            $table->boolean('faceswap_feature')->default(false);
            $table->boolean('faceswap_free_tier')->default(false);
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
            $table->dropColumn('faceswap_piapi_api');
            $table->dropColumn('faceswap_feature');
            $table->dropColumn('faceswap_free_tier');
        });
    }
};
