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
            $table->integer('o1_mini_credits')->default(0);
            $table->integer('o1_mini_credits_prepaid')->default(0);
            $table->integer('o1_preview_credits')->default(0);
            $table->integer('o1_preview_credits_prepaid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('o1_mini_credits');
            $table->dropColumn('o1_mini_credits_prepaid');
            $table->dropColumn('o1_preview_credits');
            $table->dropColumn('o1_preview_credits_prepaid');
        });
    }
};
