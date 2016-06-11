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
      // Permission::truncate();

      Permission::create(['name'=>'setting-profile','display_name'=>'Setting Profile','description'=>'setting profile','module_id'=>3]);
      Permission::create(['name'=>'setting-privacy-policy','display_name'=>'Setting Privacy & Policy','description'=>'setting privacy & policy','module_id'=>4]);
      Permission::create(['name'=>'setting-language','display_name'=>'Setting Language','description'=>'setting language','module_id'=>5]);

      Permission::create(['name'=>'create-category','display_name'=>'Create Category','description'=>'create new category','module_id'=>6]);
      Permission::create(['name'=>'read-category','display_name'=>'Read Category','description'=>'read category','module_id'=>6]);
      Permission::create(['name'=>'update-category','display_name'=>'Update Category','description'=>'update category','module_id'=>6]);
      Permission::create(['name'=>'delete-category','display_name'=>'Delete Category','description'=>'delete category','module_id'=>6]);

      Permission::create(['name'=>'create-article','display_name'=>'Create Article','description'=>'create new article','module_id'=>7]);
      Permission::create(['name'=>'read-article','display_name'=>'Read Article','description'=>'read article','module_id'=>7]);
      Permission::create(['name'=>'update-article','display_name'=>'Update Article','description'=>'update article','module_id'=>7]);
      Permission::create(['name'=>'delete-article','display_name'=>'Delete Article','description'=>'delete article','module_id'=>7]);

      Permission::create(['name'=>'create-comment','display_name'=>'Create Comment','description'=>'create new comment','module_id'=>8]);
      Permission::create(['name'=>'read-comment','display_name'=>'Read Comment','description'=>'read comment','module_id'=>8]);
      Permission::create(['name'=>'update-comment','display_name'=>'Update Comment','description'=>'update comment','module_id'=>8]);
      Permission::create(['name'=>'delete-comment','display_name'=>'Delete Comment','description'=>'delete comment','module_id'=>8]);

      // $owner = Role::where('name','owner')->first();
      // $owner->attachPermissions([1,2]); // digunakan jika mempunya permission lebih dari 1
      //
      // $admin = Role::where('name','admin')->first();
      // $admin->attachPermission(1); // 1 adalah id dari permission create-post
    }
}
