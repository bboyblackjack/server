<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use \Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Middleware для проверки кастомной авторизации
 *
 * @author O.P.Shumilin <oleg_shumilin@mail.ru>
 * @copyright Self (c) 2022
 */
class Auth
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $login = $request->post('login');
        $password = $request->post('password');

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ], [
            'login.required' => 'Необходимо указать логин!',
            'password.required' => 'Необходимо указать пароль!',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'code' => 404,
                'messages' => $validator->errors(),
            ], 404);
        }

        $user = User::where('login', $login)->first();
        if (!$user) {
            return Response::json([
                'status' => 404,
                'messages' => [
                    'login' => [
                        'Данный пользователь не найден!'
                    ]
                ],
            ], 404);
        }
        if ($user->password != $password) {
            return Response::json([
                'status' => 404,
                'messages' => [
                    'password' => [
                        'Неверно указан пароль!'
                    ]
                ],
            ], 404);
        }

        return $next($request);
    }
}
