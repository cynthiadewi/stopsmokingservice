<?php

use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /*
        Seeder for Venues Table
        @author Cynthia Dewi 
        @version 29/07/2018
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('address' => 'The Beacon, Westgate Road', 'postcode' => 'NE4 9PQ', 'start_time' =>'2018-08-27 10:30:00', 'end_time' =>'2018-08-27 11:30:00'),
            array('address' => 'Molineux Centre, Byker', 'postcode' => 'NE6 1SG', 'start_time' =>'2018-08-27 09:30:00', 'end_time' =>'2018-08-27 11:30:00'),
            array('address' => 'Denton Burn Library, West Road', 'postcode' => 'NE15 7QQ', 'start_time' =>'2018-08-27 14:30:00', 'end_time' =>'2018-08-27 16:30:00'),
            array('address' => 'Ponteland Rd Walk in, Cowgate', 'postcode' => 'NE5 3AE', 'start_time' =>'2018-08-27 14:00:00', 'end_time' =>'2018-08-27 16:30:00'),
            array('address' => 'Newcastle Library, City Centre', 'postcode' => 'NE1 8AX', 'start_time' =>'2018-08-28 10:00:00', 'end_time' =>'2018-08-28 12:00:00'),
            array('address' => 'Walker Centre, Church Walk', 'postcode' => 'NE6 3BS', 'start_time' =>'2018-08-28 14:30:00', 'end_time' =>'2018-08-28 16:30:00'),
            array('address' => 'Newbiggin Hall Childrens Centre', 'postcode' => 'NE5 1LZ', 'start_time' =>'2018-08-28 14:30:00', 'end_time' =>'2018-08-28 16:30:00'),
            array('address' => 'St Martins Centre, Walker', 'postcode' => 'NE6 2RJL', 'start_time' =>'2018-08-29 08:30:00', 'end_time' =>'2018-08-29 10:30:00'),
            array('address' => 'West End Library, Conducum Rd', 'postcode' => 'NE4 9JH', 'start_time' =>'2018-08-29 10:00:00', 'end_time' =>'2018-08-29 12:00:00'),
            array('address' => 'Outer West Pool, West Denton', 'postcode' => 'NE5 2QZ', 'start_time' =>'2018-08-29 17:00:00', 'end_time' =>'2018-08-29 19:00:00'),
            array('address' => 'Grainger Market, City Centre', 'postcode' => 'NE1 5AE', 'start_time' =>'2018-08-30 11:30:00', 'end_time' =>'2018-08-30 12:30:00'),
            array('address' => 'Blackfriars @ The Ouseburn, Newbridge Street', 'postcode' => 'NE1 2TQ', 'start_time' =>'2018-08-30 15:30:00', 'end_time' =>'2018-08-30 17:00:00'),
            array('address' => 'Kenton Centre, Hillsview Ave', 'postcode' => 'NE3 3QJ', 'start_time' =>'2018-08-31 10:00:00', 'end_time' =>'2018-08-31 12:00:00'),
            array('address' => 'Cruddas Park Centre, Community Room', 'postcode' => 'NE4 7JT', 'start_time' =>'2018-08-31 13:30:00', 'end_time' =>'2018-08-31 16:30:00'),

        );
        DB::table('venues')->insert($data);
    }
}
