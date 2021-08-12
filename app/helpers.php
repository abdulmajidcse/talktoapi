<?php
if (!function_exists('talkToApiResponse')) {
    function talkToApiResponse($data = [], $message = 'Data Retrieved Successfully!', $status_code = 200, $success = true)
    {
        if ($status_code == 422) {
            $response = response()->json(
                [
                    'success' => $success,
                    'message' => 'Form input error occured!' . ($message ? ' ' . $message : ''),
                    'errors' => $data
                ],
                $status_code
            );
        } else {
            $response = response()->json(
                [
                    'success' => $success,
                    'message' => $message,
                    'data' => $data
                ],
                $status_code
            );
        }
        return $response;
    }
}
