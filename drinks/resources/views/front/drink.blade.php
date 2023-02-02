@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            cats
        </div>
        <div class="col-9">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="list-table one">
                                <div class="top">
                                    <h3>
                                        @if($drink->vol)
                                        <svg>
                                            <use xlink:href="#glass"></use>
                                        </svg>
                                        @endif
                                        {{$drink->title}}
                                    </h3>
                                    <div class="smallimg">
                                        @if($drink->photo)
                                        <img src="{{asset($drink->photo)}}">
                                        @else
                                        <img src="{{asset('no.jpg')}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="info">
                                        <div class="type"> {{$drink->drinkType->title}}</div>
                                        <div class="size"> {{$drink->size}} ml</div>
                                    </div>
                                    <div class="buy">
                                        <div class="price"> {{$drink->price}}Eur</div>
                                        <button type="submit" class="btn btn-outline-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
