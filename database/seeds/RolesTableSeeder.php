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
      // Role::truncate();

      Role::create(['name'=>'admin','display_name'=>'Administrator','description'=>'User Administrator']);
      Role::create(['name'=>'member','display_name'=>'Member','description'=>'User Member']);

      $user = User::where('name','Revando')->first();
      $user->attachRole(1); // 1 adalah id dari role owner

      $user2 = User::where('name','Kotaro Minami')->first();
      $user2->attachRole(2); // 2 adalah id dari role admin
    }
}
