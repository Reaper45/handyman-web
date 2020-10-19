<?php

namespace App\Http\Controllers\Traits;

trait ControllerHelpers {
    /**
     * Format the api response
     *
     *
     * @param bool $success
     * @param object $data
     * @param string $message
     * 
     * @return array
     */
    protected function api_response(bool $success, $data, $message)
    {
        return [
            'success' => $success,
            'data'    => $data,
            'message' => $message
        ];
    }
}