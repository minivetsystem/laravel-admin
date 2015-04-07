<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('categories')->delete();
 
        $category = array(
            ['id' => 1, 'parent_id'=>NULL, 'name' => 'Category 1', 'slug' => 'category-1', 'is_active'=>true , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'parent_id'=>1, 'name' => 'Category 2', 'slug' => 'category-2', 'is_active'=>true , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'parent_id'=>NULL, 'name' => 'Category 3', 'slug' => 'category-3', 'is_active'=>true , 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('categories')->insert($category);
	}

}
