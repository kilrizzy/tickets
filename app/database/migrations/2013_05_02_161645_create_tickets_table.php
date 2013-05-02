<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('user_id');
			$table->integer('technician_id');
			$table->integer('client_id');
            $table->integer('address_id');
			$table->integer('priority_id');
			$table->integer('status_id');
			$table->text('description');
			$table->integer('estimated_time');
			$table->integer('completion_time');
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
        Schema::drop('tickets');
    }

}
