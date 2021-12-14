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
            "title" => "seinfeld!!!!!!!",
            "content" => "hey im jane, wow what a high quality site this is",
            "created_by" => "1",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "hello from susan",
            "content" => "i am susan and i am nice",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "my post",
            "content" => "this is bob here saying hi",
            "created_by" => "2",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "excuse me",
            "content" => "my name is Jong Xina, who are you i am from ancient greece",
            "created_by" => "4",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
