<?php

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /*
        Seeder for Appointments (available for booking) Table
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
        
        $data = array();
        for($i=1; $i<15; $i++){
            $start = DB::table('venues')->where('id', '=', $i)->value('start_time');
            $end= DB::table('venues')->where('id', '=', $i)->value('end_time');
            $appstart= $start;
            $append= $start;
            $day= date('w', strtotime($start));
        while($append < $end){
            $appstart= $append;
            $append = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($appstart)));
            array_push($data, ['venue_id' => $i, 'day' => $day, 'start_time' => $appstart, 'end_time' => $append]);
        }}
        
        DB::table('appointments')->insert($data);
    }
}
