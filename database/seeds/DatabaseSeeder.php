<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(OccupationsTableSeeder::class);
        $this->call(ReseveStatusTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
    }
}
