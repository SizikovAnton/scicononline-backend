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
            // return Message::where('hall_id', $room);
            return Message::where('hall_id', $room)->whereDate('created_at', Carbon::today())->get();
            // return Message::where('hall_id', $room)->where()
            // return $hall->messages;
            // return array_filter($hall->messages->toArray(), fn ($item) => date("d.m.y", strtotime($item["created_at"])) == date("d.m.y"));
            // print_r($hall->messages->filter(fn ($item) => date("d.m.y", strtotime($item["created_at"])) == date("d.m.y"))->all());
            // print_r($hall->messages);
            // return $hall->messages->filter(fn ($item) => date("d.m.y", strtotime($item["created_at"])) == date("d.m.y"));

        } else {
            // return array_filter(Message::all()->toArray(), fn ($item) => date("d.m.y", strtotime($item["created_at"])) == date("d.m.y"));
            // return array_filter(Message::all()->toArray(), fn ($item) => date("d.m.y", strtotime($item["created_at"])) == date("d.m.y"));
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
