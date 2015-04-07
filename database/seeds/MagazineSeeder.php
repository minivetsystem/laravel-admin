<?php

use Illuminate\Database\Seeder;

class MagazineSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('magazines')->delete();
 
        $magazine = array(
            ['id' => 1, 'category_id' => 1, 'name' => 'magazine 1', 'slug' => 'magazine-1', 'short_description' => 'short_description1' , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'category_id' => 2, 'name' => 'magazine 2', 'slug' => 'magazine-2', 'short_description' => 'short_description2' ,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'category_id' => 3, 'name' => 'magazine 3', 'slug' => 'magazine-3', 'short_description' => 'short_description3' ,'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('magazines')->insert($magazine);
    	
	}

}
