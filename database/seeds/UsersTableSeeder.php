<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/** 
         * Creates 20 (by default) randomized entries in the Users table.
         * With every pass over a user it creates a new Doc and attaches
         * a random id to the user_id field in the Doc entry. 
         */
        $numUsers = 20; 
    	factory(App\User::class, $numUsers)->create()->each(function($u, $numUsers){
    		factory(App\Doc::class)->create(['user_id' => rand(1, $numUsers)]);
    	});
    }
}
