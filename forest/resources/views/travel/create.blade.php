@extends('layouts.app')

@section('title', 'Racoon Travel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Racoon Travel</h1>
                </div>

                <div class="card-body">

                    <form action="{{route('store-travel')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Season Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season Start</label>
                            <input type="text" class="form-control" name="start">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season length</label>
                            <input type="text" class="form-control" name="length">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-info">Add</button>
                        </div>
                        @csrf
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
