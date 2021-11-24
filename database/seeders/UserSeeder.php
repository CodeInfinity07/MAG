<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'           => 'Admin',
            'username'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
        ]);
    }
}
