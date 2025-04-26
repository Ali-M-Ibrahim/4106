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
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@hotmail.com";
        $user->is_admin=true;
        $user->password = Hash::make("123");
        $user->save();

        $user2 = new User();
        $user2->name = "user";
        $user2->email = "user@hotmail.com";
        $user2->is_admin=false;
        $user2->password = Hash::make("123");
        $user2->save();
    }
}
