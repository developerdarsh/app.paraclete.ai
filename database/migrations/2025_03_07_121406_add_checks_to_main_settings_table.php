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
        Schema::table('main_settings', function (Blueprint $table) {
            $table->boolean('writer_feature')->nullable()->default(1);
            $table->boolean('writer_feature_free_tier')->nullable()->default(1); 
            $table->boolean('wizard_feature')->nullable()->default(1);
            $table->boolean('wizard_feature_free_tier')->nullable()->default(1); 
            $table->boolean('smart_editor_feature')->nullable()->default(1);
            $table->boolean('smart_editor_feature_free_tier')->nullable()->default(1); 
            $table->boolean('images_feature')->nullable()->default(1);
            $table->boolean('images_feature_free_tier')->nullable()->default(1);
            $table->boolean('rewriter_feature')->nullable()->default(1);
            $table->boolean('rewriter_feature_free_tier')->nullable()->default(1);
            $table->boolean('voiceover_feature')->nullable()->default(1);
            $table->boolean('voiceover_feature_free_tier')->nullable()->default(1);
            $table->boolean('transcribe_feature')->nullable()->default(1);
            $table->boolean('transcribe_feature_free_tier')->nullable()->default(1);
            $table->boolean('chat_feature')->nullable()->default(1);
            $table->boolean('chat_feature_free_tier')->nullable()->default(1);
            $table->boolean('vision_feature')->nullable()->default(1);
            $table->boolean('vision_feature_free_tier')->nullable()->default(1);
            $table->boolean('file_chat_feature')->nullable()->default(1);
            $table->boolean('file_chat_feature_free_tier')->nullable()->default(1);
            $table->boolean('web_chat_feature')->nullable()->default(1);
            $table->boolean('web_chat_feature_free_tier')->nullable()->default(1);
            $table->boolean('image_chat_feature')->nullable()->default(1);
            $table->boolean('image_chat_feature_free_tier')->nullable()->default(1);
            $table->boolean('code_feature')->nullable()->default(1);
            $table->boolean('code_feature_free_tier')->nullable()->default(1);
            $table->boolean('brand_voice_feature')->nullable()->default(1);
            $table->boolean('brand_voice_feature_free_tier')->nullable()->default(1);
            $table->boolean('integration_feature_free_tier')->nullable()->default(0);
            $table->boolean('team_member_feature')->nullable()->default(1);
            $table->boolean('team_member_feature_free_tier')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_settings', function (Blueprint $table) {
            $table->dropColumn('writer_feature');
            $table->dropColumn('writer_feature_free_tier'); 
            $table->dropColumn('wizard_feature');
            $table->dropColumn('wizard_feature_free_tier'); 
            $table->dropColumn('smart_editor_feature');
            $table->dropColumn('smart_editor_feature_free_tier'); 
            $table->dropColumn('images_feature');
            $table->dropColumn('images_feature_free_tier');
            $table->dropColumn('rewriter_feature');
            $table->dropColumn('rewriter_feature_free_tier');
            $table->dropColumn('voiceover_feature');
            $table->dropColumn('voiceover_feature_free_tier');
            $table->dropColumn('transcribe_feature');
            $table->dropColumn('transcribe_feature_free_tier');
            $table->dropColumn('chat_feature');
            $table->dropColumn('chat_feature_free_tier');
            $table->dropColumn('vision_feature');
            $table->dropColumn('vision_feature_free_tier');
            $table->dropColumn('file_chat_feature');
            $table->dropColumn('file_chat_feature_free_tier');
            $table->dropColumn('web_chat_feature');
            $table->dropColumn('web_chat_feature_free_tier');
            $table->dropColumn('image_chat_feature');
            $table->dropColumn('image_chat_feature_free_tier');
            $table->dropColumn('code_feature');
            $table->dropColumn('code_feature_free_tier');
            $table->dropColumn('brand_voice_feature');
            $table->dropColumn('brand_voice_feature_free_tier');
            $table->dropColumn('integration_feature_free_tier');
            $table->dropColumn('team_member_feature');
            $table->dropColumn('team_member_feature_free_tier');
        });
    }
};
