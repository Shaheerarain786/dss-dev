<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'admin123';

        $user = new \App\User();
        $user->name = $name;
        $user->email = $email;
        $user->is_super = true;
        $user->password = bcrypt($password);
        $user->save();
    }
}
