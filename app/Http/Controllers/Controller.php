<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notify($result, $messages)
    {
        if ($result) {
            $notify = [
                'message' => $messages['success'],
                'alert-type' => 'success'
            ];
        } else {
            $notify = [
                'message' => $messages['error'],
                'alert-type' => 'error'
            ];
        }

        return $notify;
    }
}