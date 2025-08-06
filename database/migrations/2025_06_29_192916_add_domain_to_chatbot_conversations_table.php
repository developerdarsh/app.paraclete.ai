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
        Schema::table('chatbot_conversations', function (Blueprint $table) {
            $table->string('domain_name')->nullable();
            $table->text('latest_message')->nullable();
            $table->integer('messages')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chatbot_conversations', function (Blueprint $table) {
            $table->dropColumn('domain_name');
            $table->dropColumn('latest_message');
            $table->dropColumn('messages');
        });
    }
};
