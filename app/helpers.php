<?php

/**
 * API response
 */

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


/**
 * API url prefix
 */

if (!function_exists('talktoapiUrl')) {
    function talktoapiUrl(string $uri, string $version = 'v1')
    {
        $uriPart = 'api/' . trim($version, '/');
        $apiUrlPrefix = url($uriPart);

        $trimedUri = trim($uri, '/');
        if ($trimedUri) {
            $apiUrl = $apiUrlPrefix . '/' . $trimedUri;
        } else {
            $apiUrl = $apiUrlPrefix;
        }

        return $apiUrl;
    }
}