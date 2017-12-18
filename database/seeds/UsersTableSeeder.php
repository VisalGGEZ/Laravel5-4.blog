<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Double Exo',
            'email' => 'doubleexo@gmail.com',
            'password' => bcrypt('123456'),
            'admin'=> 1
        ]);


        App\Profile::create([
           'user_id' => $user->id,
            'avatar' => 'upload/avatar/man.png',
            'about' => 'Stack Overflow is a community of 8.2 million programmers, just like you, helping each other. Join them; it only takes a minute.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
