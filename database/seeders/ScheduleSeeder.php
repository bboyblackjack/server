<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

/**
 * Сидер для генерации случайного расписания
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class ScheduleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Schedule::factory()
            ->count(2000)
            ->create();
    }
}
