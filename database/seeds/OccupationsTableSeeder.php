<?php

use Illuminate\Database\Seeder;

class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupation')->insert([
          [
            'id' => '1',
            'name' => 'カメラマン',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '2',
            'name' => 'コーディネーター',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '3',
            'name' => '補助',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
