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

if(! function_exists('get_extension_b64')){
    function get_extension_b64($string,$full = null)
    {
        $img_extension = '';
        preg_match("/^data:image\/(.*);base64/i",$string, $img_extension);
        return ($full) ?  $img_extension[0] : $img_extension[1];
    }

}

if(! function_exists('decode_image_b64')){
    function decode_image_b64($img){
        $image_service_str = substr($img, strpos($img, ",")+1);
        $image = base64_decode($image_service_str);
        return $image;
    }
}
