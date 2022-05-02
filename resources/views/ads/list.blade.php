@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="filters">
                <select id="filter_manufacturer_id" name="manufacturer_id" class="form-control">

                    @if (request()->exists('manufacturerId') )
                            <option value="">All</option>
                        @foreach($manufacturers as $manufacturer)
                            <option {{$manufacturer->id == request()->get('manufacturerId') ? 'selected' : ''}}
                                    value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                        @endforeach
                    @else
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            @foreach($ads as $ad)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $ad->title }}</div>
                        <div class="card-body">
                            <img width="100%" src="{{ $ad->image }}">
                        </div>
                        <div class="card-footer">
                            <span class="price">{{ $ad->price }} Eur</span>
                            <a class="btn btn-primary float-end" href="{{route('ad.show', $ad->id)}}">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach()
        </div>
    </div>
    <script src="{{ asset('js/filters.js') }}"></script>

@endsection
