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
            $table->string('textract_aws_access_key')->nullable();
            $table->string('textract_aws_secret_access_key')->nullable();
            $table->string('textract_aws_region')->nullable();
            $table->string('textract_aws_bucket')->nullable();
            $table->boolean('textract_feature')->default(false);
            $table->boolean('textract_free_tier')->default(false);
            $table->integer('textract_max_pdf_pages')->nullable()->default(1);
            $table->integer('textract_max_pdf_size')->nullable()->default(1);
            $table->integer('textract_max_image_size')->nullable()->default(1);
            $table->boolean('seo_feature')->default(false);
            $table->boolean('seo_free_tier')->default(false);
            $table->boolean('chat_realtime_feature')->default(false);
            $table->boolean('chat_realtime_free_tier')->default(false);
            $table->string('chat_realtime_voice')->nullable()->default('alloy');
            $table->string('chat_realtime_model')->nullable()->default('gpt-4o-mini-realtime-preview');
            $table->boolean('chatbot_external_feature')->default(false);
            $table->integer('chatbot_external_quantity')->nullable()->default(1);
            $table->integer('chatbot_external_domains')->nullable()->default(1);
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
            $table->dropColumn('textract_aws_access_key');
            $table->dropColumn('textract_aws_secret_access_key');
            $table->dropColumn('textract_aws_region');
            $table->dropColumn('textract_aws_bucket');
            $table->dropColumn('textract_feature');
            $table->dropColumn('textract_free_tier');
            $table->dropColumn('textract_max_pdf_pages');
            $table->dropColumn('textract_max_pdf_size');
            $table->dropColumn('textract_max_image_size');
            $table->dropColumn('seo_feature');
            $table->dropColumn('seo_free_tier');
            $table->dropColumn('chat_realtime_feature');
            $table->dropColumn('chat_realtime_free_tier');
            $table->dropColumn('chat_realtime_voice');
            $table->dropColumn('chat_realtime_model');
            $table->dropColumn('chatbot_external_feature');
            $table->dropColumn('chatbot_external_quantity');
            $table->dropColumn('chatbot_external_domains');            
        });
    }
};
