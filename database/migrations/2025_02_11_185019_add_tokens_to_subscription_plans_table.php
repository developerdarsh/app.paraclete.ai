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
            $table->dropColumn('gpt_3_turbo_credits');
            $table->dropColumn('gpt_4_turbo_credits');
            $table->dropColumn('gpt_4_credits');
            $table->dropColumn('gpt_4o_credits');
            $table->dropColumn('claude_3_opus_credits');
            $table->dropColumn('claude_3_sonnet_credits');
            $table->dropColumn('claude_3_haiku_credits');
            $table->dropColumn('fine_tune_credits');
            $table->dropColumn('gemini_pro_credits');
            $table->dropColumn('gpt_4o_mini_credits');
            $table->dropColumn('o1_mini_credits');
            $table->dropColumn('o1_preview_credits');
            $table->integer('token_credits')->nullable()->default(0);
            $table->boolean('chat_share_feature')->nullable()->default(0);
            $table->boolean('textract_feature')->nullable()->default(0);
            $table->boolean('chat_realtime_feature')->nullable()->default(0);
            $table->boolean('chatbot_external_feature')->nullable()->default(0);
            $table->integer('chatbot_external_quantity')->nullable()->default(0);
            $table->integer('chatbot_external_domains')->nullable()->default(0);
            $table->boolean('team_member_feature')->nullable()->default(0); 
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
            $table->integer('gpt_3_turbo_credits')->default(0);
            $table->integer('gpt_4_turbo_credits')->default(0);
            $table->integer('gpt_4_credits')->default(0);
            $table->integer('gpt_4o_credits')->default(0);
            $table->integer('claude_3_opus_credits')->default(0);
            $table->integer('claude_3_sonnet_credits')->default(0);
            $table->integer('claude_3_haiku_credits')->default(0);
            $table->integer('fine_tune_credits')->default(0);
            $table->integer('gemini_pro_credits')->default(0);
            $table->integer('gpt_4o_mini_credits')->default(0);
            $table->integer('o1_mini_credits')->default(0);
            $table->integer('o1_preview_credits')->default(0);
            $table->dropColumn('token_credits');
            $table->dropColumn('chat_share_feature');
            $table->dropColumn('textract_feature');
            $table->dropColumn('chat_realtime_feature');
            $table->dropColumn('chatbot_external_feature');
            $table->dropColumn('chatbot_external_quantity');
            $table->dropColumn('chatbot_external_domains');
            $table->dropColumn('team_member_feature'); 
        });
    }
};
