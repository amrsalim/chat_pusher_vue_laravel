<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class chat implements ShouldBroadcast
{
    use  SerializesModels;


    /**
     * Create a new event instance.
     */
    public  $message;

    public function __construct($message )
    {
        $this->message = $message;
//        $this->sender_id = $sender_id;
//        $this->id = $id;
//        $this->saveMessage();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('chat');
    }

  
    public function broadcastAs(): string
    {
        return 'send-message';
    }

//    private function saveMessage()
//    {
//        $message = new Message();
//        $message->content = $this->message;
//        $message->room_id = $this->id ;
//        $message->sender_id =  $this->sender_id;
//        $message->save();
//        return $message;
//    }
}
