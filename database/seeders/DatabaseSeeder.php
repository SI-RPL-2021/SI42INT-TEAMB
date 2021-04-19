<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        //  \App\Models\User::create([
        //     'name' => 'admin',
        //     'username' => 'admin'
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'admin123',
        //     'username' => 'admin',
        //     'email' => 'Str::random(10).'@gmail.com'',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
