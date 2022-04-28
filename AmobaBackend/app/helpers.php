<?php

use Illuminate\Support\Facades\Log;

if (! function_exists('custom_response')) {
    function custom_response($success = true, $message, $data = [], $code = 200)
    {
        if (!$success) {
            if ($code == 200) {
                $code = 425;
            }
            if (!empty($message)) {
                $response['data'] = $data;
            }
        }

        $response = [
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ];

        if (!$success) {
            $response['total'] = 0;
        } else {
            if ($message != 'Index') {
                $response['total'] = 1;
            } else {
                $response['total'] = count($data);
            }
        }

        return response()->json($response, $code);
    }
}



if (! function_exists('custom_Loggin')) {
    function custom_Loggin(\Exception $e)
    {
        $problem = [
            'problema' => $e->getMessage(),
            'linea' => $e->getLine(),
            'archivo' => $e->getFile()
        ];
        Log::info($problem);
    }
}
