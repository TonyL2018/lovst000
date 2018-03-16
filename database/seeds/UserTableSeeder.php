<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
          [
            'id' => '1',
            'staff_id' => 'ST01',
            'name' => 'ホワイト',
            'last_name_kanji' => 'ホワイト',
            'first_name_kanji' => 'ホワイト',
            'last_name_kana' => 'ホワイト',
            'first_name_kana' => 'ホワイト',
            'email' => 'rexceed001@gmail.com',
            'password' => '$2y$10$kBw/nMaMnWF6ZqS4CVOKPO1aRhmjHm84sxHAhgyM3AG/Esubtywhm',
            'telephone' => '09012345678',
            'role_id' => '1',
            'remarks' => '',
            'delete_flg' => '0',
            'remember_token' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ]
        ]);
    }
}
