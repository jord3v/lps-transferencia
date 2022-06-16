<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'ServerAdmin' => 'admin@test.com', 
            'DocumentRoot' => storage_path('app/public/landing-pages/'), 
            'ErrorLog' => '${APACHE_LOG_DIR}/error.log', 
            'CustomLog' => '${APACHE_LOG_DIR}/access.log combined', 
        ]);
    }
}
