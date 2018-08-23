<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//User Admin
        User::create([
        		'name' => 'Jesus',
        		'email' => 'jlopezmazzeira@gmail.com',
        		'password' => bcrypt('12345678'),
        		'role' => 0
        	]);

        //User Client
        User::create([
        		'name' => 'Daniel',
        		'email' => 'dlopezmazzeira@gmail.com',
        		'password' => bcrypt('12345678'),
        		'role' => 2
        	]);
    }
}
