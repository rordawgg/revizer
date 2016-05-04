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
        // prior to seeding, remove old table data
        DB::table("docs")->truncate();

        // Create some Docs as Admin
        factory(App\Doc::class, 5)->create(['user_id' => 1]);

        // Create some Docs randomly assigned to all other users.
        $users = App\User::all();

	    foreach($users as $user):
		    factory(App\Doc::class)->create(['user_id' => rand(2, count($users))]);
		endforeach;
    }
}
