<?php

use Illuminate\Database\Seeder;

class AboutSeederInitial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'database/seeds/raw/about.sql';
        DB::unprepared(file_get_contents($path));
    }
}
