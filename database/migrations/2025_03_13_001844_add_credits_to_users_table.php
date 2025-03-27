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
        Schema::table('users', function (Blueprint $table) {
            
            if (Schema::hasColumn('users', 'gpt_3_turbo_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_3_turbo_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4_turbo_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_turbo_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4o_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_opus_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_opus_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_sonnet_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_sonnet_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_haiku_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_haiku_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gemini_pro_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gemini_pro_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'fine_tune_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('fine_tune_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_3_turbo_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_3_turbo_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4_turbo_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_turbo_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4o_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_opus_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_opus_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_sonnet_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_sonnet_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'claude_3_haiku_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('claude_3_haiku_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'gemini_pro_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gemini_pro_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'fine_tune_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('fine_tune_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4o_mini_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_mini_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'gpt_4o_mini_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('gpt_4o_mini_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'o1_mini_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('o1_mini_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'o1_mini_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('o1_mini_credits_prepaid');           
                });            
            }

            
            if (Schema::hasColumn('users', 'o1_preview_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('o1_preview_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'o1_preview_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('o1_preview_credits_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'total_chars')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('total_chars');           
                });            
            }

            if (Schema::hasColumn('users', 'total_minutes')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('total_minutes');           
                });            
            }

            if (Schema::hasColumn('users', 'available_chars')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('available_chars');           
                });            
            }

            if (Schema::hasColumn('users', 'available_chars_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('available_chars_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'available_minutes')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('available_minutes');           
                });            
            }

            if (Schema::hasColumn('users', 'available_minutes_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('available_minutes_prepaid');           
                });            
            }

            if (Schema::hasColumn('users', 'image_credits')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('image_credits');           
                });            
            }

            if (Schema::hasColumn('users', 'image_credits_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->dropColumn('image_credits_prepaid');           
                });            
            }

        
            if (!Schema::hasColumn('users', 'minutes_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->decimal('minutes_prepaid', 15, 3)->nullable()->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'minutes')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->decimal('minutes', 15, 3)->nullable()->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'tokens')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('tokens')->nullable()->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'tokens_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('tokens_prepaid')->nullable()->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'characters_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('characters_prepaid')->nullable()->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'characters')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('characters')->nullable()->default(0);           
                });            
            }

            if (!Schema::hasColumn('users', 'images')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('images')->default(0);            
                });            
            }
            
            if (!Schema::hasColumn('users', 'images_prepaid')) {
                Schema::table('users', function (Blueprint $table) {            
                    $table->integer('images_prepaid')->default(0);            
                });            
            }
        });
    }


};
