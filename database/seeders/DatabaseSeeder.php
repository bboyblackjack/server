<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Сидер для заполнения БД пользователями и расписанием
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            ScheduleSeeder::class
        ]);
    }
}
