<?php

namespace App\Http\Controllers\Api\V1\Chat;

use App\Events\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        event(new Message($request->input('username'), $request->input('message')));

        return [];
    }
}
