<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
          [
            'id' => '1000001',
            'name' => 'お宮参り',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000002',
            'name' => 'ハーフバースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000003',
            'name' => '1歳バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000004',
            'name' => '2歳バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000005',
            'name' => 'その他バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000006',
            'name' => '入園入学、卒園卒業',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000007',
            'name' => '七五三',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000008',
            'name' => 'ハーフ成人式',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000009',
            'name' => 'マタニティ',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '1000010',
            'name' => 'その他の成長記録',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
