<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $owner = new Role;
      $owner->name = 'owner';
      $owner->display_name = 'Project Owner';
      $owner->description = 'User is the owner of a given project';
      $owner->save();

      $admin = new Role;
      $admin->name = 'admin';
      $admin->display_name = 'User Administrator';
      $admin->description = 'User is allowed to manage and edit other users';
      $admin->save();

      $user = User::where('name','Revando')->first();
      $user->attachRole(1); // 1 adalah id dari role owner

      $user2 = User::where('name','Ichsan Firdaus')->first();
      $user2->attachRole(2); // 2 adalah id dari role admin
    }
}
