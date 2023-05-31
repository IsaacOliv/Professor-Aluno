<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('teachers')->insert(
            [
                [
                    'name'     => 'admin',
                    'email'    => 'admin@admin.com',
                    'password' => Hash::make('admin')
                ],
            ]
        );
    }
}
