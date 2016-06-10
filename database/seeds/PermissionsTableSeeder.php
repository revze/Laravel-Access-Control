<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $createPost = new Permission;
      $createPost->name         = 'create-post';
      $createPost->display_name = 'Create Posts';
      $createPost->description  = 'create new blog posts';
      $createPost->save();

      $editUser = new Permission;
      $editUser->name         = 'edit-user';
      $editUser->display_name = 'Edit Users';
      $editUser->description  = 'edit existing users';
      $editUser->save();

      $owner = Role::where('name','owner')->first();
      $owner->attachPermissions([1,2]); // digunakan jika mempunya permission lebih dari 1

      $admin = Role::where('name','admin')->first();
      $admin->attachPermission(1); // 1 adalah id dari permission create-post
    }
}
