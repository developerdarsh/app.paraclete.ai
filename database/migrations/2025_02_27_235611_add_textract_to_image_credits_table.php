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
            $table->integer('textract_text')->default(1);  
            $table->integer('textract_form')->default(1);  
            $table->integer('textract_table')->default(1);  
            $table->integer('textract_receipt')->default(1);  
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
            $table->dropColumn('textract_text');  
            $table->dropColumn('textract_form');  
            $table->dropColumn('textract_table'); 
            $table->dropColumn('textract_receipt'); 
        });
    }
};
