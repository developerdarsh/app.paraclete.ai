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
        MenuItem::whereBetween('id', [43, 48])->delete();
        
        $ads = [
            ['id' => 500, 'parent_key' => NULL, 'order' => 500, 'key' => 'divider_1', 'route' => NULL, 'route_slug' => NULL, 'label' => NULL, 'icon' => 'fa-solid fa-angles-right', 'type' => 'divider', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 0],
            ['id' => 501, 'parent_key' => NULL, 'order' => 501, 'key' => 'account', 'route' => NULL, 'route_slug' => NULL, 'label' => 'Account', 'icon' => NULL, 'type' => 'label', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 0],
            ['id' => 502, 'parent_key' => NULL, 'order' => 502, 'key' => 'subscription_plans', 'route' => 'user.plans', 'route_slug' => NULL, 'label' => 'Subscription Plans', 'icon' => 'fa-solid fa-box-circle-check', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 1, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 503, 'parent_key' => NULL, 'order' => 503, 'key' => 'team_members', 'route' => 'user.team', 'route_slug' => NULL, 'label' => 'Team Members', 'icon' => 'fa-solid fa-people-arrows', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 504, 'parent_key' => NULL, 'order' => 504, 'key' => 'my_account', 'route' => 'user.profile', 'route_slug' => NULL, 'label' => 'My Account', 'icon' => 'fa-solid fa-id-badge', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 505, 'parent_key' => NULL, 'order' => 505, 'key' => 'affiliate_program', 'route' => 'user.referral', 'route_slug' => NULL, 'label' => 'Affiliate Program', 'icon' => 'fa-solid fa-badge-dollar', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 1, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 108, 'parent_key' => 104, 'order' => 113, 'key' => 'smtp_settings', 'route' => 'admin.settings.smtp', 'route_slug' => NULL, 'label' => 'SMTP Settings', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 109, 'parent_key' => 104, 'order' => 114, 'key' => 'gdpr_settings', 'route' => 'admin.settings.gdpr', 'route_slug' => NULL, 'label' => 'GDPR Cookies', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 110, 'parent_key' => 104, 'order' => 115, 'key' => 'languages', 'route' => 'elseyyid.translations.home2', 'route_slug' => NULL, 'label' => 'Languages', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 111, 'parent_key' => 104, 'order' => 116, 'key' => 'system_settings', 'route' => 'admin.settings.system', 'route_slug' => NULL, 'label' => 'System Settings', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 112, 'parent_key' => 104, 'order' => 117, 'key' => 'activation', 'route' => 'admin.settings.activation', 'route_slug' => NULL, 'label' => 'Activation', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 113, 'parent_key' => 104, 'order' => 118, 'key' => 'upgrade_software', 'route' => 'admin.settings.upgrade', 'route_slug' => NULL, 'label' => 'Upgrade Software', 'icon' => 'fa-solid fa-angles-right', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 114, 'parent_key' => NULL, 'order' => 119, 'key' => 'menu_builder', 'route' => 'admin.davinci.configs.menu', 'route_slug' => NULL, 'label' => 'Menu Builder', 'icon' => 'fa-solid fa-bars', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 1, 'extension' => 0, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
            ['id' => 115, 'parent_key' => NULL, 'order' => 120, 'key' => 'ai_speech_to_text_pro', 'route' => 'user.extension.speech.pro', 'route_slug' => NULL, 'label' => 'Speech to Text Pro', 'icon' => 'fa-solid fa-microphone', 'type' => 'item', 'svg' => NULL, 'is_active' => 1, 'is_admin' => 0, 'extension' => 1, 'url' => NULL, 'permission' => NULL, 'conditions' => [], 'badge_text' => NULL, 'badge_type' => NULL, 'children' => [], 'original' => 1],
        ];  

        foreach ($ads as $ad) {
            MenuItem::updateOrCreate(['id' => $ad['id']], $ad);
        }
    }
}
