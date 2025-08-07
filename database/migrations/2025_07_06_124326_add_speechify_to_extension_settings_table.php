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
            $table->boolean('speechify_tts_feature')->default(false);
            $table->string('speechify_tts_api')->nullable();
            $table->boolean('speechify_clone_feature')->default(false);
            $table->boolean('speechify_clone_free_tier')->default(false);
            $table->string('speechify_clone_api')->nullable();
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
            $table->dropColumn('speechify_tts_feature');
            $table->dropColumn('speechify_tts_api');
            $table->dropColumn('speechify_clone_feature');
            $table->dropColumn('speechify_clone_free_tier');
            $table->dropColumn('speechify_clone_api');
        });
    }
};
