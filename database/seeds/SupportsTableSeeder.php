<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Support
        User::create([
        		'name' => 'Soporte S1',
        		'email' => 'soporte1@gmail.com',
        		'password' => bcrypt('12345678'),
        		'role' => 1
        	]);

        User::create([
        		'name' => 'Soporte S2',
        		'email' => 'soporte2@gmail.com',
        		'password' => bcrypt('12345678'),
        		'role' => 1
        	]);
    }
}
