@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $ad->title }}</div>

                    <div class="card-body">
                        <div class="col-6">
                            <img width="100%" src="{{$ad->image}}">
                        </div>
                        <div class="col-6">
                            <p>
                                {{$ad->content}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="details">
                            <h2>Additional info:</h2>
                            <ul>
                                <li>{{$ad->price}}</li>
                                <li>{{$ad->year}}</li>
                                <li>{{$ad->vin}}</li>
                                <li>{{$ad->color->name}}</li>
                                <li>{{$ad->type->name}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="details">
                            <h2>Contact seller:</h2>
                            <ul>
                                <li>{{$ad->user->email}}</li>
                                <li>{{$ad->user->name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form class="form" method="post">
                        @csrf
                        <textarea name="content"></textarea>
                        <input type="hidden" name="ad_id" value="{{ $ad->id }}"/>
                        <input type="submit" value="Submit" class="btn btn-submit" id="comment">
                    </form>
                    <div class="comments" id="comments">
                        @foreach($comments as $comment)
                            <p>{{$comment->user->name}} says: {{$comment->content}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit").click(function(e){

            e.preventDefault();

            let content = $("textarea[name=content]").val();
            let ad_id = $("input[name=ad_id]").val();

            $.ajax({
                type:'POST',
                url:"{{ route('comment') }}",
                data:{content:content, ad_id:ad_id},
                success:function(data){

                }
            });

        });


    </script>

@endsection


