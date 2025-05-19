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
        Schema::table('image_credits', function (Blueprint $table) {
            $table->decimal('elevenlabs_file_transcribe', 10, 3)->nullable()->default(1.0);
            $table->decimal('openai_live_transcribe', 10, 3)->nullable()->default(1.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_credits', function (Blueprint $table) {
            $table->dropColumn('elevenlabs_file_transcribe');
            $table->dropColumn('openai_live_transcribe');
        });
    }
};
