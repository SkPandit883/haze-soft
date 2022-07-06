<?php

namespace App\Library;

class Message
{
    protected  $header = ['Accept' => 'application/json', 'Content-Type' => 'application/json'];

    public static function error($error, $key = 'error')
    {
        return response()->json(['status' => 'error', $key => $error], 400)->withHeaders((new self)->header);
    }
    public static function validationError($validationError)
    {
        return response()->json(['status' => 'error', 'message' => 'The given data was invalid.', 'errors' => $validationError], 400)->withHeaders((new self)->header);
    }
    public static function success($data, $key = 'data')
    {
        return response()->json(['status' => 'success', $key => $data], 200)->withHeaders((new self)->header);
    }
    public static function unauthorized()
    {
        return response()->json(['status' => 'error', 'error' => 'unauthorized action'], 401)->withHeaders((new self)->header);
    }

    public static function notFound()
    {
        return response()->json(['status' => 'error', 'message' => 'API resource not found'], 404)->withHeaders((new self)->header);
    }
}
