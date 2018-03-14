<?php

use Illuminate\Database\Seeder;

class ProductPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_price')->insert([
          [
              'id' => '1',
              'product_id' => '0001',
              'price' => '9999',
              'start_date' => '2018-02-01',
              'end_date' => '2018-03-31',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
          [
              'id' => '2',
              'product_id' => '0001',
              'price' => '8888',
              'start_date' => '2018-02-01',
              'end_date' => '2018-03-31',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
          [
              'id' => '3',
              'product_id' => '0001',
              'price' => '7777',
              'start_date' => '2018-02-01',
              'end_date' => '2018-03-31',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
        ]);
    }
}
