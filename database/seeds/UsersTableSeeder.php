<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'sr.nguyenhuudat@gmail.com';
        $user->name = 'Nguyen Huu Dat';
        $user->password = bcrypt('123456');
        $user->save();

        $admin = Role::where('name', 'admin')->first();
        $user->attachRole($admin->id);
    }
}
