<?php

use Illuminate\Database\Seeder;
Use App\User;
Use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();  
        $user = new User();
        $user->name = 'admin';
        $user->ficha = '95427';
        $user->email = 'raul@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach( $role_admin);
        
        $user = new User();
        $user->name = 'user';
        $user->ficha = '95428';
        $user->email = 'raul1@gmail.com';
        $user->password = Hash::make('123456789');
        $user->save();
        $user->roles()->attach($role_user);
        
    }
}
