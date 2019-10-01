<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarbersratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbersrates', function (Blueprint $table) {
            $table->bigIncrements('b_r_id');
            $table->double('b_rate', 8, 2);
            $table->bigInteger('customer_id');
            $table->bigInteger('barber_id');
            $table->softDeletes();
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
        Schema::dropIfExists('barbersrates');
    }
}
