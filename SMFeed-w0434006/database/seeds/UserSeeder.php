<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "Jane",
            "email" => "jane@example.com",
            "password" => '$2a$12$MJKZ8hY62qllF31TEAM/reV1CA8ch9XF0R3p30mtV.aUDbXEHz4zK',
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("users")->insert([
            "name" => "Bob",
            "email" => "bob@example.com",
            "password" => '$2a$12$ZlgtE2VQMkpw1RoBlRLtHeecGMFvfzpdUwVyR0LdkyYZiIXCZYmJu',
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("users")->insert([
            "name" => "Susan",
            "email" => "susan@example.com",
            "password" => '$2a$12$3CcXTWpBx9yDBiJwRmgGmOrgm27wmfeTiOW/s1lQbYKN8s5rAp/nq',
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("users")->insert([
            "name" => "Ben",
            "email" => "ben@example.com",
            "password" => '$2a$12$3CcXTWpBx9yDBiJwRmgGmOrgm27wmfeTiOW/s1lQbYKN8s5rAp/nq',
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
