<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика для генерации случайного расписания
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class ScheduleFactory extends Factory
{
    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        $month_range = range(1, 12);
        $month = $month_range[array_rand($month_range)];

        if (in_array($month, [1, 3, 5, 7, 8, 10, 12])) {
            $days_range = range(1, 31);
        } elseif ($month == 2) {
            //Только на 2022 год
            $days_range = range(1, 28);
        } else {
            $days_range = range(1, 30);
        }
        $day = $days_range[array_rand($days_range)];

        $hour_range = range(0, 23);
        $hour = $hour_range[array_rand($hour_range)];

        $minute_range = range(0, 50, 10);
        $minute = $minute_range[array_rand($minute_range)];

        return [
            'flight_number' => mt_rand(1000000, 9999999),
            'flight_name' => $this->faker->city() . ' -> ' . $this->faker->city(),
            'departure_date' => Carbon::createFromDate(2022, $month, $day),
            'departure_time' => Carbon::createFromTime($hour, $minute, 0),
        ];
    }
}
