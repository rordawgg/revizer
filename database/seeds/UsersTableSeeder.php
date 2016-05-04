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
        // prior to seeding, remove old table data
        DB::table("users")->truncate();
        DB::table("profiles")->truncate();
    	/**
         * Creates a default sample admin user.   
         */
        $u = factory(App\User::class)->create([
                'email' => 'admin@example.com',
                'password' => bcrypt('admin')
            ]);

            factory(App\Profile::class)->create([
                'user_id' => $u->id, 'username' => 'admin',
                'first_name' => 'Admin', 'last_name' => 'Revizr',
                'avatar' => md5($u->email),
                'created_at' => $u->created_at,
                'updated_at' => $u->updated_at
            ]);
        /** 
         * Creates 20 (by default) randomized entries in the Users table.
         * With every pass over a user it creates a new Doc and attaches
         * a random id to the user_id field in the Doc entry. 
         */
        
        $numUsers = 20; 
    	factory(App\User::class, $numUsers)->create()->each(function($u, $numUsers){
            factory(App\Profile::class)->create([
                'user_id' => $u->id,
                'avatar' => md5($u->email),
                'created_at' => $u->created_at,
                'updated_at' => $u->updated_at
            ]);
    	});
    }
}
