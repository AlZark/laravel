@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach($chats as $chat)
                <div class="col-md-12">
                    <div class="card">
                        @if($chat->sender_id != Auth::id())
                            <div class="card-header">Chat with {{ $chat->sender->name }}</div>
                            <a class="btn btn-primary float-end" href="{{route('message.show', $chat->sender_id)}}">
                                Read more
                            </a>
                        @else
                            <div class="card-header">Chat with {{ $chat->receiver->name }}</div>
                            <a class="btn btn-primary float-end" href="{{route('message.show', $chat->receiver_id)}}">
                                Read more
                            </a>
                        @endif
                        <div class="card-body">
                            <p><strong>Latest message: </strong>{{ $chat->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach()

        </div>
    </div>

@endsection
