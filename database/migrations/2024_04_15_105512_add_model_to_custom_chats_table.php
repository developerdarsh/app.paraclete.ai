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
        Schema::table('custom_chats', function (Blueprint $table) {
            $table->string('model_mode')->nullable()->default('individual');
            $table->string('category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_chats', function (Blueprint $table) {
            $table->dropColumn('model_mode');
            $table->dropColumn('category');
        });
    }
};
