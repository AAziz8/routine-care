<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
     
      $this->call([
        PermissionTableSeeder::class,
      ]);

      $user = User::create([
        'name' => 'Faheem Ullah',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678'),
      ]);

       $role = Role::create(['name' => 'Admin']);

       $permissions = Permission::pluck('id','id')->all();

       $role->syncPermissions($permissions);

       $user->assignRole([$role->id]);

   }
}
