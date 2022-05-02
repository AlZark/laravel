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
                                <li><strong>Price: </strong> {{$ad->price}} Eur</li>
                                <li><strong>Manufacturer: </strong>{{$ad->manufacturer->name}}</li>
                                <li><strong>Model: </strong>{{$ad->model->name}}</li>
                                <li><strong>Type: </strong>{{$ad->type->name}}</li>
                                <li><strong>Year: </strong>{{$ad->year}}</li>
                                <li><strong>Color: </strong>{{$ad->color->name}}</li>
                                <li><strong>VIN: </strong>{{$ad->vin}}</li>
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
                        <textarea name="content" cols="40" rows="3"></textarea>
                        <input type="hidden" name="ad_id" value="{{ $ad->id }}"/><br>
                        <input type="submit" value="Submit" class="btn btn-submit btn-primary" id="comment">
                    </form>
                    <br>
                    <div class="comments" id="comments">
                        @foreach($comments as $comment)
                            <div class="comment">
                                <p><strong>{{$comment->user->name}} says: </strong> {{$comment->content}}</p>
                                <p><i>{{$comment->created_at}}</i></p>
                            </div>
                            <hr>
                        @endforeach
                        {{ $comments->links() }}
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


