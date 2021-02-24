<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Jaye Fowler','email' => 'jayefowler@gmail.com','password' => Hash::make('userpassword123'),'role'=>0],
            ['name' => 'Remi Cochran','email' => 'remicochran@gmail.com','password' => Hash::make('userpassword123'),'role'=>1],
            ['name' => 'Ava-Rose Oneil','email' => 'avaroseoneil@gmail.com','password' => Hash::make('userpassword123'),'role'=>1],
            ['name' => 'Marnie Meyers','email' => 'marniemeyers@gmail.com','password' => Hash::make('userpassword123'),'role'=>1],
            ['name' => 'Kajus Townsend','email' => 'kajustownsend@gmail.com','password' => Hash::make('userpassword123'),'role'=>1],
            ['name' => 'Maggie Bush','email' => 'maggiebush@gmail.com','password' => Hash::make('userpassword123'),'role'=>0],
            ['name' => 'Linzi Gregory','email' => 'linzigregory@gmail.com','password' => Hash::make('userpassword123'),'role'=>1]
            ]);
    }
}
