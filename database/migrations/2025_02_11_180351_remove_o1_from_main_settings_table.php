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
            $table->dropColumn('gpt_4o_mini_credits');
            $table->dropColumn('o1_mini_credits');
            $table->dropColumn('o1_preview_credits');           
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
            $table->integer('gpt_4o_mini_credits')->nullable()->default(0);
            $table->integer('o1_mini_credits')->nullable()->default(0);
            $table->integer('o1_preview_credits')->nullable()->default(0);
        });
    }
};
