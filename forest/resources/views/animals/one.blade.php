@extends('layouts.app')

@section('title', 'List of Animals')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($number == 1)
                    <h1>Racoon</h1>
                    @elseif($number == 2)
                    <h1>Beaver</h1>
                    @else
                    <h1>Moose</h1>
                    @endif
                </div>

                <div class="card-body">

                    <ul class="list-group mt-4">
                        @forelse($colors as $color)
                        <li class="list-group-item">{{$color}}</li>
                        @empty
                        <li class="list-group-item">No colors</li>
                        @endforelse
                    </ul>

                    <ul class="list-group mt-4">
                        @foreach($colors as $color)
                        <li class="list-group-item">{{$color}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
