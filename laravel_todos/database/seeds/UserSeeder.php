<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		'name'=>'Tan',
        		'email'=>'tan@gmail.com',
        		'password'=>bcrypt('123'),
        		'display_name'=>'Trần Quang Tân',
        		'created_at' => new DateTime()
	        ]
        );
    }
}
