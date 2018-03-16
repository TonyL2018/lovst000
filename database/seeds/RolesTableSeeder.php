<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          [
            'id' => '1',
            'name' => 'LOVSTホールディングス',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '2',
            'name' => 'LOVST事務所',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '3',
            'name' => 'FC本部',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '4',
            'name' => '店舗マネージャー',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '5',
            'name' => '店舗スタッフ',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
