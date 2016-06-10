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
        $user = new User;
        $user->name = 'Revando';
        $user->email = 'revze@outlook.co.id';
        $user->password = bcrypt('revando');
        $user->save();

        $user2 = new User;
        $user2->name = 'Ichsan Firdaus';
        $user2->email = 'ichsanfirdaus99@gmail.com';
        $user2->password = bcrypt('ichsan');
        $user2->save();
    }
}
