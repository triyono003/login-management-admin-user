<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = [
         [
           'username' => 'admin',
           'name' => 'akun admin',
           'email' => 'admin@gmail.com',
           'level' => 'admin',
           'password' => bcrypt('123456'),
           ],
         [
           'username' => 'editor',
           'name' => 'akun user',
           'email' => 'user@gmail.com',
           'level' => 'editor',
           'password' => bcrypt('123456'),
           ],
         ];
         foreach($user as $key => $value){
           User::create($value);
         }
    }
}
