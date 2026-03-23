<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@test.test';
        $admin->password = bcrypt($admin->email);
        $admin->save();
    }
}
