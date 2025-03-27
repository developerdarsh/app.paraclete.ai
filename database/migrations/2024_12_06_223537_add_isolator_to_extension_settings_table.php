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
            $table->string('voice_isolator_elevenlabs_api')->nullable();
            $table->boolean('voice_isolator_feature')->default(false);
            $table->boolean('voice_isolator_free_tier')->default(false);
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
            $table->dropColumn('voice_isolator_elevenlabs_api');
            $table->dropColumn('voice_isolator_feature');
            $table->dropColumn('voice_isolator_free_tier');
        });
    }
};
