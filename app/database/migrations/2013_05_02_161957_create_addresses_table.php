<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('client_id');
			$table->string('address1',100);
			$table->string('address2',100);
			$table->string('city',50);
			$table->string('state',10);
			$table->string('zipcode',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }

}
