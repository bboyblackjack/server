<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Расписание рейсов
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class Schedule extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'schedule';

    /**
     * @var bool
     */
    public $timestamps = false;
}
