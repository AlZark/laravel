@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Redeguoti skelbima') }}</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('ad.update', $ad->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Pavadinimas"
                                       value="{{ $ad->title }}">
                                <textarea name="content" class="form-control">{{ $ad->content }}
                                </textarea>
                                <input name="image" type="text" class="form-control" placeholder="image.jpg"
                                       value="{{ $ad->image }}">
                                <input name="year" type="text" class="form-control" placeholder="1990"
                                       value="{{ $ad->year }}">
                                <input name="vin" type="text" class="form-control" placeholder="VIN"
                                       value="{{ $ad->vin }}">
                                <input name="price" type="number" class="form-control" placeholder="price"
                                       value="{{ $ad->price }}">
                                <select name="color_id" class="form-control">
                                    @foreach($colors as $color)
                                        @if($color->id == $ad->color_id)
                                            <option selected value="{{$color->id}}">{{$color->name}}</option>
                                        @else
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="type_id" class="form-control">
                                    @foreach($types as $type)
                                        @if($type->id == $ad->type_id)
                                            <option selected value="{{$type->id}}">{{$type->name}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="manufacturer_id" class="form-control" id="manufacturer">
                                    @foreach($manufacturers as $manufacturer)
                                        @if($manufacturer->id == $ad->manufacturer_id)
                                            <option selected
                                                    value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @else
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <select name="model_id" class="form-control" id="model">
                                    @foreach($models as $model)
                                        @if($model->id == $ad->model_id)
                                            <option selected="{{$model->id}}">{{$model->name}}</option>
                                        @elseif($ad->manufacturer_id == $model->manufacturer_id)
                                            <option value="{{$model->id}}">{{$model->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <input type="submit" value="Edit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#manufacturer').change(function () {
            $.ajax({
                url: "{{ route('models.get_by_manufacturer') }}?manufacturer_id=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#model').html(data.html);
                }
            })
        })
    </script>
@endsection
