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
        Schema::table('vendor_prices', function (Blueprint $table) {
            $table->double('o1_mini')->default(0);
            $table->double('o1_preview')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_prices', function (Blueprint $table) {
            $table->dropColumn('o1_mini');
            $table->dropColumn('o1_preview');
        });
    }
};
