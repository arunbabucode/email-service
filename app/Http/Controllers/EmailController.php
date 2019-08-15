<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserValidationRequest;

class EmailController extends Controller
{
    public function send(UserValidationRequest $userValidationRequest)
    {
        $validated = $userValidationRequest->validated();

        sleep(5);
        echo "foo";
    }
}
