<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('AccountsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('TicketsTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('AddressesTableSeeder');
		$this->call('StatusesTableSeeder');
		$this->call('PrioritiesTableSeeder');
		$this->call('LogsTableSeeder');
		$this->call('FilesTableSeeder');
		$this->call('SchedulesTableSeeder');
		$this->call('ScheduleTimesTableSeeder');
	}

}