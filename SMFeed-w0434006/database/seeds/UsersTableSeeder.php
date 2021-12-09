<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert users data
        // Jane
        DB::table('users')->insert([
            'name' => 'Jane UserAdmin',
            'email' => 'Jane@example.com',
            'password' => Hash::make('inet2005'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Bob
        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'Bob@example.com',
            'password' => Hash::make('inet2005'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Susan
        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'Susan@example.com',
            'password' => Hash::make('inet2005'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
