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
            $table->string('logo_frontend')->default('uploads/logo/frontend-logo.png');
            $table->string('logo_frontend_collapsed')->default('uploads/logo/frontend-collapsed-logo.png');
            $table->string('logo_frontend_footer')->default('uploads/logo/frontend-footer-logo.png');
            $table->string('logo_dashboard')->default('uploads/logo/dashboard-logo.png');
            $table->string('logo_dashboard_dark')->default('uploads/logo/dashboard-dark-logo.png');
            $table->string('logo_dashboard_collapsed')->default('uploads/logo/dashboard-collapsed-logo.png');
            $table->string('logo_dashboard_collapsed_dark')->default('uploads/logo/dashboard-collapsed-dark-logo.png');
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
            $table->dropColumn('logo_frontend');
            $table->dropColumn('logo_frontend_collapsed');
            $table->dropColumn('logo_frontend_footer');
            $table->dropColumn('logo_dashboard');
            $table->dropColumn('logo_dashboard_dark');
            $table->dropColumn('logo_dashboard_collapsed');
            $table->dropColumn('logo_dashboard_collapsed_dark');
        });
    }
};
