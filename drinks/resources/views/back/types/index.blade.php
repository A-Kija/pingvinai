@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>All types</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($types as $type)
                        <li class="list-group-item">
                            <div class="list-table">
                                <div class="list-table__content">
                                    <h3>{{$type->title}}</h3>
                                    @if($type->is_alk)
                                    <div class="alk">
                                        <svg>
                                            <use xlink:href="#glass"></use>
                                        </svg>
                                    </div>
                                    @else 
                                        <div class="no-alk"></div>
                                    @endif
                                    <div class="count">[{{$type->typeDrinks()->count()}}]</div>
                                </div>
                                <div class="list-table__buttons">
                                    @if(Auth::user()?->role == 'admin')
                                    <a href="{{route('types-edit', $type)}}" class="btn btn-outline-success">Edit</a>
                                    <form action="{{route('types-delete', $type)}}" method="post">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No types yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
