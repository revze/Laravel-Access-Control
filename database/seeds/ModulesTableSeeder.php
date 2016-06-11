<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Module::truncate();

        Module::create(['name'=>'settings','display_name'=>'Settings','description'=>'Setting menu','parent_id'=>NULL]);
        Module::create(['name'=>'master','display_name'=>'Master','description'=>'Master menu','parent_id'=>NULL]);

        Module::create(['name'=>'profile','display_name'=>'Profile','description'=>'Profile menu','parent_id'=>1]);
        Module::create(['name'=>'privacy-policy','display_name'=>'Privacy & Policy','description'=>'Privacy & Policy menu','parent_id'=>1]);
        Module::create(['name'=>'language','display_name'=>'Language','description'=>'Language menu','parent_id'=>1]);

        Module::create(['name'=>'categories','display_name'=>'Categories','description'=>'Category menu','parent_id'=>2]);
        Module::create(['name'=>'articles','display_name'=>'Articles','description'=>'Article menu','parent_id'=>2]);
        Module::create(['name'=>'comments','display_name'=>'Comments','description'=>'Comment menu','parent_id'=>2]);
    }
}
