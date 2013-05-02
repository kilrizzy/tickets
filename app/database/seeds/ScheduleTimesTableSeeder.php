<?php

class ScheduleTimesTableSeeder extends Seeder {

    public function run()
    {
        $schedule_times = array(
        	array(
        		'schedule_id' => 1,
        		'hour' => 9,
        		'day' => 1
        	),
        );

        // Uncomment the below to run the seeder
        //DB::table('schedule_times')->insert($schedule_times);
    }

}