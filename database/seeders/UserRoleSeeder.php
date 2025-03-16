<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::find(1); // Change ID to the correct user
        if ($user) {
            $user->role = 'admin'; // Change as needed
            $user->save();
            echo "User role updated successfully!";
        } else {
            echo "User not found.";
        }
    }
}
