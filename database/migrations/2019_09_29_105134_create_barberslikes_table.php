<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarberslikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barberslikes', function (Blueprint $table) {
            $table->bigIncrements('b_l_id');
            $table->boolean('b_like');
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
        Schema::dropIfExists('barberslikes');
    }
}
