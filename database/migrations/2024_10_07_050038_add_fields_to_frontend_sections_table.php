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
        Schema::table('frontend_sections', function (Blueprint $table) {
            $table->text('how_it_works_description')->nullable();
            $table->text('tools_description')->nullable();
            $table->text('templates_description')->nullable();
            $table->text('reviews_description')->nullable();
            $table->text('blogs_description')->nullable();
            $table->text('info_description')->nullable();
            $table->text('images_description')->nullable();
            $table->string('clients_title_dark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frontend_sections', function (Blueprint $table) {
            $table->dropColumn('how_it_works_description');
            $table->dropColumn('tools_description');
            $table->dropColumn('templates_description');
            $table->dropColumn('reviews_description');
            $table->dropColumn('blogs_description');
            $table->dropColumn('info_description');
            $table->dropColumn('images_description');
            $table->dropColumn('clients_title_dark');
        });
    }
};
