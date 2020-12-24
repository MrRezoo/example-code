<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

if (!function_exists('try_catch')) {
    /**
     * @param $try_message
     * @param $catch_message
     * @param $catch_status
     * @param Closure|null $callback
     * @return JsonResponse
     */
    function try_catch($try_message, $catch_message, $catch_status, Closure $callback = null)
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
    function try_catch_api(Closure $callback, $successArray, $successStatus = 200, array $exceptionArray = null, int $exceptionStatus = 500)
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


//if (!function_exists('try_catch')) {
//    /**
//     * @param Closure $callback
//     * @param array|null $exceptionArray
//     * @param int $exceptionStatus
//     * @return JsonResponse
//     */
//    function try_catch(Closure $callback, array $exceptionArray = null, int $exceptionStatus = 500)
//    {
//        try {
//            return $callback();
//        } catch (Exception $exception) {
//            return \response()->json(
//                $exceptionArray ?? ['message' => $exception->getMessage()],
//                $exceptionStatus
//            );
//        }
//    }
//}

if (!function_exists('upload_image')) {
    /**
     * @param UploadedFile $file
     * @param string $directory
     * @param string $disk
     * @param int $width
     * @param int $height
     * @param string $encode
     * @return string
     */
    function upload_image(UploadedFile $file, string $directory, int $width = 440, int $height = 320, string $encode = 'jpg', string $disk = 'public')
    {
        $fullPath = $directory . '/' . time() . Str::random(10) . '.' . $encode;
        $imageFile = Image::make($file->getRealPath())->resize($width, $height)->encode($encode, 100);
        Storage::disk($disk)->put($fullPath, $imageFile);
        return $fullPath;
    }
}
