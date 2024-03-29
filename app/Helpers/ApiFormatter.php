<?php 

use App\Helpers;

namespace ApiFormatter;

class ApiFormatter {

    protected $response = [
        'code' => null,
        'message' => null,
        'data' => null
    ];

    public static function createApi($code = null, $message = null, $data = null ) {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()-json(self::response, self::response['code']);
    }
}



?>