<?php

class AccountsTableSeeder extends Seeder {

    public function run()
    {
        $accounts = array(
        	array(
        		'name' => "Default Account",
        	),
        );

        // Uncomment the below to run the seeder
        //DB::table('accounts')->insert($accounts);
    }

}