<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adminoperators')->insert([
            'name' => "Mohamed",
            'email' => "mohamed@gmail.com",
            'password' => Hash::make('12341234'),
            'role' => "Admin",
        ]);   

        DB::table('adminoperators')->insert([
            'name' => "Aly",
            'email' => "aly@gmail.com",
            'password' => Hash::make('12345678'),
            'role' => "operator",
        ]);   
    
    }
}
