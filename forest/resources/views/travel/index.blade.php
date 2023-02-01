@extends('layouts.app')

@section('title', 'List of Travels')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>List of Travels</h1>
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        @foreach($travels as $travel)
                        <li class="list-group-item">
                            <h2>{{$travel->title}}</h2>
                            <span>From: {{$travel->startNice}} To: {{$travel->endNice}}</span>
                        </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
