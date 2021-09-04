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
        User::updateOrCreate([
            'email' => 'admin@devon.com'
        ],[
            'name' => 'Admin',
            'password' => bcrypt('admin@2021')
        ]);
    }
}
