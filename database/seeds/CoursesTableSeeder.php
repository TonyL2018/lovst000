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
            'id' => '1',
            'name' => 'お宮参り',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '2',
            'name' => 'ハーフバースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '3',
            'name' => '1歳バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '4',
            'name' => '2歳バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '5',
            'name' => 'その他バースデー',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '6',
            'name' => '入園入学、卒園卒業',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '7',
            'name' => '七五三',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '8',
            'name' => 'ハーフ成人式',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '9',
            'name' => 'マタニティ',
            'new_flg' => '1',
            'owner_id' => '1',
            'delete_flg' => '0',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '10',
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
