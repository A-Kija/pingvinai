@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('front.common.cats')
        </div>
        <div class="col-9">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        @forelse($drinks as $drink)
                        <div class="col-4">
                            <div class="list-table">
                                <div class="top">
                                    <h3>
                                        @if($drink->vol)
                                        <svg>
                                            <use xlink:href="#glass"></use>
                                        </svg>
                                        @endif
                                        {{$drink->title}}
                                    </h3>
                                    <a href="{{route('show-drink', $drink)}}">
                                    <div class="smallimg">
                                        @if($drink->photo)
                                        <img src="{{asset($drink->photo)}}">
                                        @else
                                        <img src="{{asset('no.jpg')}}">
                                        @endif
                                    </div>
                                    </a>
                                </div>
                                <div class="bottom">
                                    <div class="info">
                                        <div class="type"> {{$drink->drinkType->title}}</div>
                                        <div class="size"> {{$drink->size}} ml</div>
                                    </div>
                                    <div class="buy">
                                        <div class="price"> {{$drink->price}}Eur</div>
                                        <form action="{{route('add-to-cart')}}" method="post">
                                        <button type="submit" class="btn btn-outline-primary">Add</button>
                                        <input type="number" min="1" name="count" value="1">
                                        <input type="hidden" name="product" value="{{$drink->id}}">
                                        @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        No drinks yet
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="m-2">{{ $drinks->links() }}</div>
        </div>
    </div>
</div>
@endsection
