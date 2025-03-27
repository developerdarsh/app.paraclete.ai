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
            $table->integer('midjourney_fast')->nullable()->default(1);
            $table->integer('midjourney_relax')->nullable()->default(1);
            $table->integer('midjourney_turbo')->nullable()->default(1);
            $table->integer('faceswap')->nullable()->default(1);
            $table->integer('pebblely_fashion')->nullable()->default(1);
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
            $table->dropColumn('midjourney_fast');
            $table->dropColumn('midjourney_relax');
            $table->dropColumn('midjourney_turbo');
            $table->dropColumn('faceswap');
            $table->dropColumn('pebblely_fashion');
        });
    }
};
