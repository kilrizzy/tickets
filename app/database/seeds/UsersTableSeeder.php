<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $users = array(
        	array(
                'account_id' => 1,
        		'username' => "admin",
        		'password' => Hash::make('admin')
        	),
        );

        // Uncomment the below to run the seeder
        //DB::table('users')->insert($users);
    }

}