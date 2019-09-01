<?php

use Illuminate\Database\Seeder;
use App\ItemPrice;

class ItemPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(ItemPrice::all()->isEmpty()) {
            ItemPrice::create(['position_id' => 1,
                               'order_date_from' => '2019-02-01',
                               'order_date_to' => '2019-02-09',
                               'delivery_date_from' => '2019-03-10',
                               'price' => 100]);

            ItemPrice::create(['position_id' => 1,
                               'order_date_from' => '2019-02-01',
                               'delivery_date_from' => '2019-03-01',
                               'delivery_date_to' => '2019-03-09',
                               'price' => 100]);

            ItemPrice::create(['position_id' => 1,
                               'order_date_from' => '2019-02-10',
                               'delivery_date_from' => '2019-03-10',
                               'price' => 200]);

            ItemPrice::create(['position_id' => 1,
                               'order_date_from' => '2019-02-20',
                               'delivery_date_from' => '2019-02-25',
                               'delivery_date_to' => '2019-02-28',
                               'price' => 130]);
        }
    }
}
