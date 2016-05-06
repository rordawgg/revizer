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

        /**
         * A reusable anon-function for ensuring that the owner
         * of the Document is not the same as the owner of 
         * the Revision.
         * @var [func]
         */
        $diff_user = function($uid, $total, $doc) use (&$diff_user){
            return ($doc->user_id === $uid ? 
                $diff_user(rand(1, $total), $total, $doc) : $uid);
        };
        // Get a count of document to use for range.
        $docs = App\Doc::all();
        $total = count($docs);

        // Adding Revisions as Admin to random User Docs
        foreach($docs as $doc):
            $doc->load('user');
            $uid = $diff_user($doc->user_id, $total, $doc);
	        factory(App\Revision::class)->create([
	        	'user_id' => $uid,
	        	'doc_id' => $doc->id,
	        	'description' => function() use($doc, $uid){
                    return ($uid === 1 ? 'Admin making revision ' :
                        'User making revision ').$doc->description;
                },
	        	'body' => function() use($doc, $uid){
                    return ($uid === 1 ?
                        'Revised by Admin. ' : 'Revised by User. '
                    ).$doc->body;
                }
	        ]);
    	endforeach;
    }
}
