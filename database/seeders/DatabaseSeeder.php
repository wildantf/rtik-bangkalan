<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        Permission::create(['name' => 'create articles']); // menambahkan artikel (user,admin,super-admin)
        Permission::create(['name' => 'edit articles']); // mengedit artikel (user,admin,super-admin)
        Permission::create(['name' => 'validation articles']); //validasi artikel (admin,super-admin)
        Permission::create(['name' => 'create category']); // menambahkan kategori (admin,super-admin)
        Permission::create(['name' => 'set role']); // mengatur role user (super-admin)
        Permission::create(['name' => 'delete user']); // menghapus user (super-admin)
        
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create articles');
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('validation articles');
        $role1->givePermissionTo('create category');
        
        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('create articles');
        $role2->givePermissionTo('edit articles');
        

        $user=User::create([
            "name" => 'Wildan Tamma Faza Chair',
            "username" => "wildantf",
            "email" => 'wildantammafazachair877@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),

        ]);
        $user->assignRole($role);

        $user=User::create([
            "name" => 'Abigail Ahza Gatan',
            "username" => "abigail",
            "email" => 'abigailahzagatan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),

        ]);
        $user->assignRole($role1);
        
        $user=User::create([
            "name" => 'Muhammad Casildo',
            "username" => "mcasildo",
            "email" => 'casildo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            
        ]);
        $user->assignRole($role2);

        // User::factory(5)->create();

        Category::create([
            "name" => 'Programing',
            "slug" => 'programing',
        ]);
        Category::create([
            "name" => 'Web Design',
            "slug" => 'web-design',
        ]);
        Category::create([
            "name" => 'Data Science',
            "slug" => 'data-science',
        ]);

        Post::factory(20)->create();
    }
}
