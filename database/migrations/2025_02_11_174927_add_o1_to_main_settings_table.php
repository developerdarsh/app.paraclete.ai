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
        Schema::table('main_settings', function (Blueprint $table) {
            $table->integer('token_credits')->nullable()->default(0);
            $table->string('deepseek_api')->nullable();
            $table->string('deepseek_base_url')->nullable()->default('https://api.deepseek.com/v1');
            $table->string('xai_api')->nullable();
            $table->string('xai_base_url')->nullable()->default('https://api.x.ai/v1');
            $table->string('model_credit_name')->nullable()->default('words');
            $table->string('model_charge_type')->nullable()->default('both');
            $table->string('model_disabled_vendors')->nullable()->default('hide');
            $table->string('realtime_data_engine')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_settings', function (Blueprint $table) {
            $table->dropColumn('token_credits');
            $table->dropColumn('deepseek_api');
            $table->dropColumn('deepseek_base_url');
            $table->dropColumn('xai_api');
            $table->dropColumn('xai_base_url');
            $table->dropColumn('model_credit_name');
            $table->dropColumn('model_charge_type');
            $table->dropColumn('model_disabled_vendors');
            $table->dropColumn('realtime_data_engine');
        });
    }
};
