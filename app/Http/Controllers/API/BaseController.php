<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [];

        if (empty($result)) {
            $response = [
                'success' => true,
                'message' => $message,
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $errors = '';

        if (!empty($errorMessages)) {
            //$response['data'] = $errorMessages;
            $errors = implode(', ', Arr::flatten($errorMessages));
        }

        $response = [
            'success' => false,
            'message' => $error . ' - ' . $errors,
        ];

        return response()->json($response, $code);
    }
}
