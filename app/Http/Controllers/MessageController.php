<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function __contrsuct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $receivers = Message::select('receiver_id')->distinct()->where('sender_id', Auth::id())->get();
        $senders = Message::select('sender_id')->distinct()->where('receiver_id', Auth::id())->get();

        $uniqReceivers = [];
        $uniqSenders = [];

        foreach ($receivers as $key => $receiver) {
            $uniqReceivers[$key] = $receiver['receiver_id'];
        }
        foreach ($senders as $key => $sender) {
            $uniqSenders[$key] = $sender['sender_id'];
        }

        $uniqChats = array_unique(array_merge($uniqReceivers, $uniqSenders));

        foreach ($uniqChats as $key => $uniqChat){
            $chats[$key] = Message::where('receiver_id', Auth::id())
                ->where('sender_id', $uniqChat)
                ->orWhere('receiver_id', $uniqChat)
                ->where('sender_id', Auth::id())
                ->limit(1)
                ->get();
        }

        foreach ($chats as $key => $chat) {
            $c[$key] = $chat[0];
        }

        $data['chats'] = $c;

        return view('messages.chatlist', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $data['messages'] = Message::where('sender_id', $id)
            ->where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->where('receiver_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $data['receiver'] = User::where('id', $id)->first();

        foreach ($data['messages'] as $message) {
            if($message['receiver_id'] == Auth::id() && $message['seen'] == 0) {
                self::setAsSeen($message);
            }
        }
        return view('messages.show', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receiver = $request->post('receiver_id');

        $message = new Message();
        $message->content = $request->post('content');
        $message->sender_id = Auth::id();
        $message->receiver_id = $receiver;
        $message->seen = 0;
        $message->created_at = now();
        $message->updated_at = now();

        $message->save();
        return to_route('message.show', [$receiver]);
    }

    public static function priceChangeNotification($newPrice, $oldPrice, $adTitle, $favoritedBy)
    {
        foreach ($favoritedBy as $element){
            $direction = ($newPrice > $oldPrice) ? 'increased' : 'decreased';

            $message = new Message();
            $message->content = 'Price of ' . $adTitle . ' has ' . $direction . ' from ' . $oldPrice . 'Eur to ' . $newPrice . 'Eur';
            $message->sender_id = 12;
            $message->receiver_id = $element['user_id'];
            $message->seen = 0;
            $message->created_at = now();
            $message->updated_at = now();
            $message->save();
        }
    }

    public function setAsSeen(Message $message)
    {
        $message->seen = 1;
        $message->save();
    }
}
