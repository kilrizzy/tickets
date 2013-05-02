<?php

class SchedulesTableSeeder extends Seeder {

    public function run()
    {
        $schedules = array(
        	array(
        		'name' => "Basic 9am-5pm / Mon-Fri",
                'account_id' => 1
        	),
        );

        // Uncomment the below to run the seeder
        //DB::table('schedules')->insert($schedules);
    }

}