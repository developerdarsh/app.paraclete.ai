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
            $table->string('frontend_theme')->default('default');
            $table->string('dashboard_theme')->default('default');
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
            $table->dropColumn('frontend_theme');
            $table->dropColumn('dashboard_theme');
        });
    }
};
