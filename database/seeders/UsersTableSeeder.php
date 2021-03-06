<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $data = [
            [
                'name'      =>  'Admin',
                'email'     =>  'admin@example.com',
                'password'  =>  Hash::make('123123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
