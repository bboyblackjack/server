<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Создание таблицы «schedule»
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
return new class extends Migration {

    /**
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->integer('flight_number');
            $table->string('flight_name');
            $table->time('departure_time');
            $table->date('departure_date');
            $table->unique(['flight_number', 'flight_name', 'departure_time', 'departure_date'], 'schedule_unique_1');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
};
