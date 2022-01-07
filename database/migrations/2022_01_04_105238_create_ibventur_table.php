<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbventurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibventur', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->string('email');
            $table->string('aveturnover');
            $table->string('growingincome');
            $table->string('ebitda');
            $table->string('avenetincome');
            $table->string('pos_result');
            $table->string('netfindebt');
            $table->string('fixedassets');
            $table->string('companypercent');
            $table->string('perturncustomer');
            $table->string('audited');
            $table->string('pur_operations');
            $table->string('sell_company');
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
        Schema::dropIfExists('ibventur');
    }
}
