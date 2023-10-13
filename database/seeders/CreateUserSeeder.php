<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'name'=>'TestUser',
                'email'=>'testUser@gmail.com',
                'password'=> Hash::make('testUser'),
                'email_verified_at'=>"2019-03-11 12:25:00",
                'role'=>0,
            ],
            [
                'name'=>'TestAdmin',
                'email'=>'testAdmin@gmail.com',
                'password'=> Hash::make('testAdmin'),
                'email_verified_at'=>"2019-03-11 12:25:00",
                'role'=>1,
            ],
            [
                'name'=>'TestInventarios',
                'email'=>'testInventarios@gmail.com',
                'password'=> Hash::make('testInventarios'),
                'email_verified_at'=>"2019-03-11 12:25:00",
                'role'=>2,
            ],
        ];
        
        foreach ($users as $user)
        {
            User::create($user);
        } 
    }
}
