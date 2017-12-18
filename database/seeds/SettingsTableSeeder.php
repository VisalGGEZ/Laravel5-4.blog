<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
           'site_name' => 'Laravel\'s blog',
           'address' => 'Combodia, Phnom Penh',
           'contact_number' => '010 499 805',
           'contact_email' => 'visal012896@gmail.com'
        ]);
    }
}
