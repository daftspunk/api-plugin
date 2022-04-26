<?php namespace RainLab\Api\Http\Controllers;

use Illuminate\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function failedValidation(Validator $validator, $code = 422)
    {
        return response([
            'errors' => $validator->errors()->all(),
        ], $code);
    }

    public function failed($message, $code = 422)
    {
        return response([
            'errors' => $message,
        ], $code);
    }

    public function success($data, $code = 200)
    {
        return response($data, $code);
    }
}