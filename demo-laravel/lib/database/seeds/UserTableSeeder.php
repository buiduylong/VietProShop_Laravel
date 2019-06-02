<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
    			'email' => 'buiduylong@gmail.com',
    			'password' => bcrypt('123456'),
    			'level' => 1,
    		],
    		[
    			'email' => 'buiduylong2@gmail.com',
    			'password' => bcrypt('123456'),
    			'level' => 2,
    		],
    	];
        DB::table('users')->insert($data);
    }
}
