<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /*
        Seeder for the application
        @author Cynthia Dewi 
        @version 29/07/2018
     */
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call('VenuesTableSeeder');
        $this->command->info('Venues table seeded!');
        $this->call('AppointmentsTableSeeder');
        $this->command->info('Appointments table seeded!');
    }
}
