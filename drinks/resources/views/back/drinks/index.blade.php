@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>All drinks</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($drinks as $drink)
                        <li class="list-group-item">
                            <div class="list-table">
                                <div class="list-table__content">
                                    <h3>{{$drink->title}}</h3>
                                    @if($drink->vol)
                                    <div class="alk">
                                        <svg>
                                            <use xlink:href="#glass"></use>
                                        </svg>
                                    </div>
                                    @else 
                                        <div class="no-alk"></div>
                                    @endif
                                    <div class="size"> {{$drink->size}}L</div>
                                    <div class="price"> {{$drink->price}}Eur</div>
                                    <div class="type"> {{$drink->drinkType->title}}</div>
                                </div>
                                <div class="list-table__buttons">
                                    <a href="{{route('drinks-edit', $drink)}}" class="btn btn-outline-success">Edit</a>
                                    <form action="{{route('drinks-delete', $drink)}}" method="post">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No drinks yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
