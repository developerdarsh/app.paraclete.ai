<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [            
            ['id' => 117, 'parent_key' => NULL, 'order' => 117, 'key' => 'external_chatbot', 'route' => 'user.extension.chatbot', 'route_slug' => NULL, 'label' => 'AI Chatbots', 'icon' => 'fa-solid fa-user-robot', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 1, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
        ];  

        foreach ($ads as $ad) {
            MenuItem::updateOrCreate(['id' => $ad['id']], $ad);
        }
    }
}
