<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'mansourtony44@gmail.com')->first();

        if(!$user){
            User::create([
               'name' => 'tony',
               'email' => 'mansourtony44@gmail.com',
                'password' => Hash::make('Tonytony123'),
                'role' => 'admin'
            ]);
        }
    }
}
