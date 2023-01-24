@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit type</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('types-update', $type)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Type title</label>
                            <input type="text" class="form-control" name="type_title"
                             value="{{old('type_title', $type->title)}}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1"
                             id="type-alk" name="is_alk" 
                             @if((!count($errors->all()) && $type->is_alk) || ($errors && old('is_alk'))) checked @endif>
                            <label class="form-check-label pointer" for="type-alk">
                                Is Alk
                            </label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary mt-4">Save</button>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
