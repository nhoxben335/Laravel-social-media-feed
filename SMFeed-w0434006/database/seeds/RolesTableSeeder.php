<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert roles data
        DB::table('roles')->insert([
            'name' => 'UserController Administrator',
            'description' => 'Managers Admin Users',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'Moderates Posts',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'Manages Themes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
