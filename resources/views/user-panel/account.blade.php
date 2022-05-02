@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="details">
                                <h2>Additional info:</h2>
                                <ul>
                                    <li>{{$user->name}}</li>
                                    <li>{{$user->email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
