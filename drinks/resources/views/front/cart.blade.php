@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('front.common.cats')
        </div>
        <div class="col-9">
            <div class="card-body">
                <div class="card-body">
                    <form action="{{route('update-cart')}}" method="post">
                        <ul class="list-group">
                            @forelse($cartList as $drink)
                            <li class="list-group-item">
                                <div class="list-table cart">
                                    <div class="list-table__content">
                                        <h3> @if($drink->vol)
                                            <svg>
                                                <use xlink:href="#glass"></use>
                                            </svg>@endif{{$drink->title}}
                                        </h3>
                                        <div class="size">
                                            <input type="number" min="1" name="count[]" value="{{$drink->count}}"> botles
                                            <input type="hidden" name="ids[]" value="{{$drink->id}}">
                                        </div>
                                        <div class="price"> {{$drink->sum}}Eur</div>
                                        <div class="type"> {{$drink->drinkType->title}}</div>

                                        <div class="smallimg">
                                            @if($drink->photo)
                                            <img src="{{asset($drink->photo)}}">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="list-table__buttons">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <li class="list-group-item">Cart Empty</li>
                            @endforelse
                            <li class="list-group-item">
                            <button type="submit" class="btn btn-outline-primary">Update cart</button>
                            </li>
                        </ul>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
