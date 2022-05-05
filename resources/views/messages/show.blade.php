@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($messages as $message)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Chat with {{ $receiver->name }}
                                </div>
                                <div class="card-body">
                                    @if($message->sender_id == Auth::id())
                                        <p><strong>You:</strong> {{ $message->content }}</p>

                                    @else
                                        <p><strong>{{ $message->sender->name }}:</strong> {{ $message->content }}
                                    @endif
                                    <p>{{ $message->created_at }}</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('message.send') }}">
                            @csrf
                            <textarea name="content" cols="40" rows="3"></textarea>
                            <input type="hidden" name="receiver_id" value="{{ $receiver->id }}"/><br>
                            <input type="submit" value="Send" class="btn btn-submit btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
