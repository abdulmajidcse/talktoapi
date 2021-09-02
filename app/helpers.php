<?php
if (!function_exists('talkToApiResponse')) {
    function talkToApiResponse($data = [], $message = '', $status_code = 200, $success = true)
    {
        // set message
        if ($success && !$message) {
            $message = 'Data Retrieved Successfully!';
        } else if (!$success && !$message) {
            $message = 'error occured!';
        }
        
        /// set response
        if ($success) {
            $response = response()->json(
                [
                    'success' => $success,
                    'message' => $message,
                    'data'    => $data,
                ],
                $status_code
            );
        } else {
            $response = response()->json(
                [
                    'success' => $success,
                    'message' => $message,
                    'errors'  => $data,
                ],
                $status_code
            );
        }

        return $response;
    }
}
