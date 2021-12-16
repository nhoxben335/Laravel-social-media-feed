<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("themes")->insert([
            "name" => "A",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "B",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/pulse/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "C",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "D",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "E",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
