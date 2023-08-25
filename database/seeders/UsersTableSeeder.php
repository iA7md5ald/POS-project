<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'=>'Super',
            'last_name'=>'Admin',
            'email'=>'super_admin@app.com',
            'password'=>Hash::make('123456'),
        ]);

        $user->attachRole('super_admin');

    }// end of run

}// end of seeder
