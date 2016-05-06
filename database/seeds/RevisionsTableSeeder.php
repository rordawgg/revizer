<?php

use Illuminate\Database\Seeder;

class RevisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // prior to seeding, remove old table data
        DB::table("revisions")->truncate();

        // Get a count of document to use for range.
        $docs = App\Doc::all();
        // Adding Revisions as Admin to random User Docs
        foreach($docs as $doc):
            $doc->load('user');
	        factory(App\Revision::class)->create([
	        	'user_id' => 1,
	        	'doc_id' => rand(2, count($docs)),
	        	'description' => 'Admin Making A Revision',
	        	'body' => 'Revised by Admin. '. $doc->body
	        ]);
    	endforeach;

        // Get a count of users to use as a range
        $users = App\User::all();

        foreach($users as $user):
        	$user->load('profile');
            $doc = rand(1, count($docs));
	        factory(App\Revision::class)->create([
	        	'user_id' => rand(2, count($users)),
	        	'doc_id' => $doc,
	        	'description' => 'Revision made by User',
	        	'body' => 'Revised by ' . $user->profile->username .
                    ' ' . $docs[$doc - 1]->body
	        ]);
	    endforeach;
    }
}
