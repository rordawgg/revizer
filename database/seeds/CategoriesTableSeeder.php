<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table("cats")->truncate();

	    $cats = array(
	    	["name" => "other", 
	    		"created_at" => new DateTime(), 
	    		"updated_at" => new DateTime()],
	    	["name" => "marketing",
	    		"created_at" => new DateTime(), 
	    		"updated_at" => new DateTime()],
	    	["name" => "essay",
	    		"created_at" => new DateTime(), 
	    		"updated_at" => new DateTime()],
	    	["name" => "recipes",
	    		"created_at" => new DateTime(), 
	    		"updated_at" => new DateTime()],
	    	["name" => "stories",
	    		"created_at" => new DateTime(), 
	    		"updated_at" => new DateTime()]
	    );

	    $categories = App\Cat::insert($cats);
	 //    foreach($cats as $cat):
		//     factory(App\Category::class)->create([]);
		// endforeach;
    }
}
