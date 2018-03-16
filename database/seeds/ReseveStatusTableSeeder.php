<?php

use Illuminate\Database\Seeder;

class ReseveStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseve_status')->insert([
          [
            'id' => '1',
            'status' => '詳細メール',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '2',
            'status' => '撮影30日前通知',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '3',
            'status' => '撮影前日通知',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '4',
            'status' => 'メルマガ',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
