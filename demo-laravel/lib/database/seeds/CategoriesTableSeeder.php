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
    	$data = [
    		[
    			'cate_name'=>'iPhone',
    			'cate_slug'=>str_slug('iPhone')
    		],

    		[
    			'cate_name'=>'Samsung',
    			'cate_slug'=>str_slug('Samsung')
    		],

    		[
    			'cate_name'=>'Xiaomi',
    			'cate_slug'=>str_slug('Xiaomi')
    		],
    	];
        DB::table('categories')->insert($data);
    }
}
