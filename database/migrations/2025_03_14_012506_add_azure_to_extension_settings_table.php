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
            $table->string('azure_openai_endpoint')->nullable();
            $table->string('azure_openai_key')->nullable();
            $table->boolean('azure_openai_activate')->default(false);
            $table->string('amazon_bedrock_access_key')->nullable();
            $table->string('amazon_bedrock_secret_key')->nullable();
            $table->string('amazon_bedrock_region')->nullable()->default('us-west-2');
            $table->string('elevenlabs_speech_pro_api')->nullable();
            $table->boolean('speech_text_pro_feature')->default(false);
            $table->boolean('speech_text_pro_free_tier')->default(false);
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
            $table->dropColumn('azure_openai_endpoint');
            $table->dropColumn('azure_openai_key');
            $table->dropColumn('azure_openai_activate');
            $table->dropColumn('amazon_bedrock_access_key');
            $table->dropColumn('amazon_bedrock_secret_key');
            $table->dropColumn('amazon_bedrock_region');
            $table->dropColumn('elevenlabs_speech_pro_api');
            $table->dropColumn('speech_text_pro_feature');
            $table->dropColumn('speech_text_pro_free_tier');
        });
    }
};
