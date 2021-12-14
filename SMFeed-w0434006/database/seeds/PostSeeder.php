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
            "title" => "Shaco champion",
            "content" => "This is a jungler champion",
            "created_by" => "1",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "Caitlyn champion",
            "content" => "This is ADC champion",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "Yasuo champion",
            "content" => "This is a skillfull champion",
            "created_by" => "2",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "Zed champion",
            "content" => "This is assassine champion",
            "created_by" => "4",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
