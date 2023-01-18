@extends('layouts.app')

@section('title', 'Make nice post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>POST FORM</h1>
                    <h3 data-no="result: no result">result: {{$sum}}</h3>

                    @if(Session::has('status'))
                    <h2 class="alert alert-success">{{ Session::get('status') }}</h2>
                    @endif

                    @if($errors)
                    @foreach ($errors->all() as $message)
                    <h2 class="alert alert-danger">{{ $message }}</h2>
                    @endforeach
                    @endif
                    
                </div>

                <div class="card-body">
                    <form action="{{route('do-form')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Sum X</label>
                            <input type="text" name="sum_x" class="form-control" value="{{ old('sum_x') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sum Y</label>
                            <input type="text" name="sum_y" class="form-control" value="{{ old('sum_y') }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-warning m-1">Sum it!</button>
                            <button type="button" id="reset" class="btn btn-outline-warning m-1">Clear</button>
                        </div>
                        {{-- @csrf --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
