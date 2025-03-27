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
            $table->boolean('ibm_watson_feature')->default(false);
            $table->string('ibm_watson_api')->nullable();
            $table->string('ibm_watson_endpoint_url')->nullable();
            $table->string('clipdrop_api')->nullable();
            $table->string('hubspot_access_token')->nullable();
            $table->string('mailchimp_api')->nullable();
            $table->string('mailchimp_list_id')->nullable();
            $table->string('perplexity_api')->nullable();
            $table->string('perplexity_realtime_model')->nullable()->default('sonar');
            $table->boolean('chat_share_feature')->default(false);
            $table->boolean('chat_share_free_tier')->default(false);
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
            $table->dropColumn('ibm_watson_feature');
            $table->dropColumn('ibm_watson_api');
            $table->dropColumn('ibm_watson_endpoint_url');
            $table->dropColumn('clipdrop_api');
            $table->dropColumn('hubspot_access_token');
            $table->dropColumn('mailchimp_api');
            $table->dropColumn('mailchimp_list_id');
            $table->dropColumn('perplexity_api');
            $table->dropColumn('perplexity_realtime_model');
            $table->dropColumn('chat_share_feature');
            $table->dropColumn('chat_share_free_tier');
        });
    }
};
