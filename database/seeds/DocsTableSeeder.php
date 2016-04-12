<?php

use Illuminate\Database\Seeder;

class DocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("docs")->insert([
            "user_id" => 1,
            "title" => str_random(20),
            "description" => str_random(150),
            "criteria" => str_random(100),
            "body" => str_random(300),
            "active_revision" => 1
        ]);
    }
}
