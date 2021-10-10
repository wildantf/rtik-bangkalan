<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name"=>"Super admin"]);
        
        Role::create([
            "name"=>"Admin"]);
        
        Role::create([
            "name"=>"User"]);


        Permission::create([
            "name"=>"Create Post"
        ]);

        Permission::create([
            "name"=>"Update Post"
        ]);
        Permission::create([
            "name"=>"Publish Post"
        ]);
        Permission::create([
            "name"=>"Change User Role"
        ]);
        Permission::create([
            "name"=>"Change Role Permission"
        ]);
        


        User::create([
                "name"=>'Wildan Tamma Faza Chair',
                "username"=>"wildantf",
                "email"=>'wildantammafazachair877@gmail.com',
                'password'=>bcrypt('password'),
                'is_admin'=>1,
            ]);

            // User::create([
        //     "name"=>'Abigail Ahza Gatan',
        //     "email"=>'abigailahzagatan@gmail.com',
        //     'password'=>bcrypt('12345'),
        // ]);
        User::factory(5)->create();

        Category::create([
            "name"=>'Programing',
            "slug"=>'programing',
        ]);
        Category::create([
            "name"=>'Web Design',
            "slug"=>'web-design',
        ]);
        Category::create([
            "name"=>'Data Science',
            "slug"=>'data-science',
        ]);

        Post::factory(20)->create();
        
    }
}
