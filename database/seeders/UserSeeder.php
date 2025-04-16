<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(10)->create();

        $user = new User();
        $user->name= "Admin";
        $user->email="admin@hotmail.com";
        $user->password = Hash::make("123");
        $user->is_admin=true;
        $user->save();


        $user = new User();
        $user->name= "User";
        $user->email="user@hotmail.com";
        $user->password = Hash::make("123");
        $user->is_admin=false;
        $user->save();
    }
}
