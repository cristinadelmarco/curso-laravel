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
        User::create([
        	'name' => 'Nuevo',
        	'email' => 'usuario@bkool.com',
        	'password' => bcrypt('asdfasdf'),
            'admin' => true
        ]);
    }
}