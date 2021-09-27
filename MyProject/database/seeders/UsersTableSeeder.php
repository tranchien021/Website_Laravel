<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::truncate();
        

        
        $adminRoles=Roles::where('name','admin')->first();
        $authorRoles=Roles::where('name','author')->first();
        $userRoles=Roles::where('name','user')->first();
        
        $admin=Users::create([
            'name'=>'chienadmin',
            'email'=>'chienadmin2105@gmail.com',
            'phone'=>'123456789',
            'password'=>md5('1')
        ]);
        $author=Users::create([
            'name'=>'chienauthor',
            'email'=>'chienauthor@gmail.com',
            'phone'=>'1234567891',
            'password'=>md5('1')
        ]);
        $user=Users::create([
            'name'=>'chienuser',
            'email'=>'chienuser@gmail.com',
            'phone'=>'123456789',
            'password'=>md5('1')
        ]);

        $admin->Roles()->attach($adminRoles);
        $author->Roles()->attach($authorRoles);
        $user->Roles()->attach($userRoles);
        
       
        
        



    }
}
