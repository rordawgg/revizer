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
        $cats  = App\Cat::all();

        // Create some Docs as Admin
        for($i = 0; $i < 4; $i++):
            factory(App\Doc::class)->create([
                'user_id' => 1,
                'cat_id'  => rand(1, count($cats))
            ]);
        endfor;

        // Create some Docs randomly assigned to all other users.
        $users = App\User::all();
        

	    foreach($users as $user):
		    factory(App\Doc::class)->create([
                'user_id' => rand(2, count($users)),
                'cat_id'  => rand(1, count($cats))
            ]);
		endforeach;
    }
}
