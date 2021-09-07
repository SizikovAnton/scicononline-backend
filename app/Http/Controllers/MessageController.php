<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
// use App\Models\Hall;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($room = null)
    {
        if ($room) {
            if ($room == 1 || $room == 2 || $room == 3) {
                return Message::where('hall_id', $room)->whereDate('created_at', Carbon::today())->get();
            } else {
                return Message::where('hall_id', $room)->get();
            }
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
