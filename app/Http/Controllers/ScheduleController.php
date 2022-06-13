<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Расписание рейсов
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class ScheduleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scheduleList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'departure_date' => 'required|date'
        ], [
            'departure_date.required' => 'Необходимо указать дату отправления!',
            'departure_date.date' => 'Необходимо указать дату в формате «год-месяц-день»!'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'status' => 404,
                'messages' => $validator->errors()
            ], 404);
        }

        $schedules = Schedule::where('departure_date', $request->get('departure_date'))->get();

        if ($schedules->isEmpty()) {
            return Response::json([
                'status' => 404,
                'messages' => [
                    'departure_date' => [
                        'На данную дату не найдено рейсов :('
                    ]
                ]
            ], 404);
        }
        return Response::json([
            'status' => 200,
            'items' => $schedules
        ], 200);
    }
}
