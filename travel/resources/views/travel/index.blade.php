@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h1>Add new travel</h1>
                </div>
                <div class="card-body js--form">
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">hotel</label>
                        <input type="text" class="form-control" name="hotel">
                    </div>
                    <button type="button" class="btn btn-outline-primary" data-url="{{route('travel-store')}}" data-method="post">
                        Add New
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Travels list</h1>
                    <div class="mb-3">
                        <div class="js--form">
                            <label class="form-label">Sort</label>
                            <select class="form-select" id="sort">
                                <option value="az">A-Z</option>
                                <option value="za">Z-A</option>
                            </select>
                            <button type="button" class="btn btn-outline-primary mt-2" data-url="{{route('travel-index')}}" data-method="get">
                                Sort
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="--list">
                    @include('travel.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
