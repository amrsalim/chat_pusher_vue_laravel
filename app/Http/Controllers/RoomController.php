<?php

namespace App\Http\Controllers;

use App\Events\chat;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{


    public  function create ($id)
    {

        // create new message
        $message = new Message();
        $message->content = request()->message;
        $message->receive_id = $id ;
        $message->user_id =  request()->sender_id;
        $message->save();
        event((new chat(request()->message)));

        return response()->json("ok");
    }


    public  function show ($id)
    {
        // get all message by room id
        $message = Message::select("content" , 'receive_id' , 'user_id')
            ->with('sender')
            ->where("receive_id" , $id )
            ->orWhere("user_id" , $id )
            ->get();
        return  view("chat" , compact(['message'  , 'id']));
    }

    public  function find ($id)
    {
        // get all message by room id
        $message = Message::select("content" , 'receive_id' , 'user_id')
            ->with('sender')
            ->where("receive_id" , $id )
            ->orWhere("user_id" , $id )
            ->get();
        return response()->json($message);
    }

}
