<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456789'),
            'email_verified_at'=>now(),
            'is_admin'=>1
        ]);
    }
}
