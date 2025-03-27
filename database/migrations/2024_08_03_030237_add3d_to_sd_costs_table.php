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
        Schema::table('sd_costs', function (Blueprint $table) {
            $table->integer('sd_photo_studio_style')->default(4);
            $table->integer('sd_photo_studio_3d')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sd_costs', function (Blueprint $table) {
            $table->dropColumn('sd_photo_studio_style');
            $table->dropColumn('sd_photo_studio_3d');
        });
    }
};
