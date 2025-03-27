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
        Schema::table('frontend_settings', function (Blueprint $table) {
            $table->string('custom_css_url')->nullable();
            $table->string('custom_js_url')->nullable();
            $table->longText('custom_header_code')->nullable();
            $table->longText('custom_body_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frontend_settings', function (Blueprint $table) {
            $table->dropColumn('custom_css_url');
            $table->dropColumn('custom_js_url');
            $table->dropColumn('custom_header_code');
            $table->dropColumn('custom_body_code');
        });
    }
};
