<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("posts")->insert([
            "title" => "A",
            "content" => "Hey",
            "created_by" => "1",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "B",
            "content" => "Hello",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "C",
            "content" => "Hi",
            "created_by" => "2",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "D",
            "content" => "Sup",
            "created_by" => "4",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
