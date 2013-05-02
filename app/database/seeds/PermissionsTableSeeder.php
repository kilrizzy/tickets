<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        $permissions = array(
        	array(
        		'name' => "manage_accounts",
        	),
        	array(
        		'name' => "manage_users",
        	),
        	array(
        		'name' => "manage_statuses",
        	),
        	array(
        		'name' => "manage_priorities",
        	),
        	array(
        		'name' => "manage_clients",
        	),
        	array(
        		'name' => "manage_tickets",
        	),
        	array(
        		'name' => "technician",
        	),
        );

        // Uncomment the below to run the seeder
        //DB::table('permissions')->insert($permissions);
    }

}