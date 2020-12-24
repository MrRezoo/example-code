<?php

use Illuminate\Http\JsonResponse;


if (!function_exists('try_catch')) {
    /**
     * @param $try_message
     * @param $catch_message
     * @param $catch_status
     * @param Closure|null $callback
     * @return JsonResponse
     */
    function try_catch($try_message, $catch_message, $catch_status, Closure $callback = null): JsonResponse
    {
        try {
            $result = $callback();
            return response()->json(
                [
                    (isset($try_message) ? 'message' : 'data') => isset($try_message) ? $try_message : $result,
                    'status' => 200,
                ]
            );
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => !is_null($catch_message) ? $catch_message : $exception->getMessage(),
                ], ($catch_status) ? $catch_status : 500);
        }
    }
}


if (!function_exists('try_catch_api')) {
    /**
     * @param Closure $callback
     * @param $successArray
     * @param int $successStatus
     * @param array|null $exceptionArray
     * @param int $exceptionStatus
     * @return JsonResponse
     */
    function try_catch_api(Closure $callback, $successArray, $successStatus = 200, array $exceptionArray = null, int $exceptionStatus = 500): JsonResponse
    {
        try {
            $callback();
            return \response()->json(
                $successArray,
                $successStatus ?? 200
            );
        } catch (Exception $exception) {
            return \response()->json(
                $exceptionArray ?? ['message' => $exception->getMessage()],
                $exceptionStatus
            );
        }
    }

}
