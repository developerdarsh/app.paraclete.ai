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
        Schema::table('prepaid_plans', function (Blueprint $table) {
            
             if (Schema::hasColumn('prepaid_plans', 'gpt_3_turbo_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gpt_3_turbo_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'gpt_4_turbo_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_turbo_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'gpt_4_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'gpt_4o_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'claude_3_opus_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_opus_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'claude_3_sonnet_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_sonnet_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'claude_3_haiku_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_haiku_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'gemini_pro_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gemini_pro_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'fine_tune_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('fine_tune_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'gpt_4o_mini_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_mini_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('prepaid_plans', 'o1_mini_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('o1_mini_credits_prepaid');           
                });            
            }


            if (Schema::hasColumn('prepaid_plans', 'o1_preview_credits_prepaid')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('o1_preview_credits_prepaid');           
                });            
            }
            
            
             if (Schema::hasColumn('prepaid_plans', 'model')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->dropColumn('model');           
                });            
            }

            
            
            if (!Schema::hasColumn('prepaid_plans', 'tokens')) {
                Schema::table('prepaid_plans', function (Blueprint $table) {            
                    $table->integer('tokens')->nullable()->default(0);            
                });            
            }
            
        });
    }

};
