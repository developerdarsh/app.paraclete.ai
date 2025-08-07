<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = [
            ['id' => 8, 'vendor_id' => 'ibm_nrl', 'enabled' => 0, 'cost' => 0.000016],
            ['id' => 9, 'vendor_id' => 'speechify_nrl', 'enabled' => 0, 'cost' => 0.000016],
        ];

        foreach ($vendors as $vendor) {
            Vendor::updateOrCreate(['id' => $vendor['id']], $vendor);
        }
    }
}
