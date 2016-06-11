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
        User::create(['name'=>'Revando','email'=>'revze@outlook.co.id','password'=>bcrypt('revando')]);
        User::create(['name'=>'Kotaro Minami','email'=>'kotaro@domain.com','password'=>bcrypt('kotaro')]);
    }
}
