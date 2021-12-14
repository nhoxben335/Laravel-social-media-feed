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
            "name" => "Cosmo",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "Journal",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "Litera",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "Lumen",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table("themes")->insert([
            "name" => "Minty",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
