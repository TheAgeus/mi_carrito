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
                'role'=>0,
            ],
            [
                'name'=>'TestAdmin',
                'email'=>'testAdmin@gmail.com',
                'password'=> Hash::make('testAdmin'),
                'role'=>1,
            ],
            [
                'name'=>'TestInventarios',
                'email'=>'testInventarios@gmail.com',
                'password'=> Hash::make('testInventarios'),
                'role'=>2,
            ],
        ];
        
        foreach ($users as $user)
        {
            User::create($user);
        } 
    }
}
