<?php
if (!function_exists('greetings')) {
    function greetings($name = 'Shahin'): string
    {
        return "Hello {$name}";
    }
}

if (!function_exists('successResponse')) {
    function successResponse($data = [], $message = 'Data retrieved successfully!', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
