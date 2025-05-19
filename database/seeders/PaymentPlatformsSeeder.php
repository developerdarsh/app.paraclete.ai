<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentPlatform;

class PaymentPlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            ['id' => 21, 'name' => 'Wallet', 'image' => 'img/payments/wallet.avif', 'enabled' => false, 'subscriptions_enabled' => false],
        ];

        foreach ($platforms as $platform) {
            PaymentPlatform::updateOrCreate(['id' => $platform['id']], $platform);
        }
    }
}
