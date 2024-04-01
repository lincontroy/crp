<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
            array('id' => '1','admin_id' => '1','country' => 'United States','name' => 'Tether','code' => 'USDT','symbol' => '₮','type' => 'CRYPTO','flag' => 'b707dbff-8d47-4868-b5be-e86d2f428611.webp','rate' => '1.00000000','sender' => '1','receiver' => '1','default' => '1','status' => '1','created_at' => '2023-08-07 14:46:22','updated_at' => '2023-08-07 15:46:30')
        );
        Currency::insert($currencies);
    }
}
