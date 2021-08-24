<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Hall;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hall $hall = null)
    {
        if ($hall) {
            return $hall->messages;
        } else {
            return Message::all();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create($request->toArray());
        broadcast(new MessageSent($message));
        // TODO Добавить отправку статуса
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return $message;
    }
}
