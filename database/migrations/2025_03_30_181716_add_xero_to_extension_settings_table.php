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
            $table->string('xero_client_id')->nullable();
            $table->string('xero_client_secret')->nullable();
            $table->string('open_router_key')->nullable();
            $table->boolean('open_router_activate')->default(false);
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
            $table->dropColumn('xero_client_id');
            $table->dropColumn('xero_client_secret');
            $table->dropColumn('open_router_key');
            $table->dropColumn('open_router_activate');
        });
    }
};
