<?php
if (!function_exists('talkToApiResponse')) {
    function talkToApiResponse($data = [], $message = 'Data Retrieved Successfully!', $status_code = 200, $success = true)
    {
        return response()->json(
            [
                'success' => $success,
                'message' => $message,
                'data' => $data
            ],
            $status_code
        );
    }
}
