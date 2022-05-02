@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12"><img
                    src="https://dayintechhistory.com/wp-content/uploads/2013/01/1912-ford-model-t-2-lg1.jpg"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="https://cf.ltkcdn.net/cars/images/std/155285-425x340r1-modelT.jpg">
            </div>
            <div class="col-4">
                <img src="https://cf.ltkcdn.net/cars/images/std/155285-425x340r1-modelT.jpg">
            </div>
            <div class="col-4">
                <img src="https://cf.ltkcdn.net/cars/images/std/155285-425x340r1-modelT.jpg">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h2>POPULAR</h2>
            @foreach($pop_ads as $ad)
                <h3>{{ $ad->title }}</h3>
                <img width="100%" src="{{ $ad->image }}">
            @endforeach
            </div>
            <div class="col-6">
            <h2>NEWEST</h2>
            @foreach($new_ads as $ad)
                <h3>{{ $ad->title }}</h3>
                <img width="100%" src="{{ $ad->image }}">
            @endforeach
        </div>
        </div>

@endsection
