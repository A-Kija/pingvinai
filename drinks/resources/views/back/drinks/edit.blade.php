@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit drink</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('drinks-update', $drink)}}" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Drink title</label>
                                        <input type="text" class="form-control" name="drink_title" value="{{old('drink_title', $drink->title)}}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Drink type</label>
                                        <select id="drink--create--edit" class="form-select" name="type_id">
                                            @foreach($types as $type)
                                            <option value="{{$type->id}}" @if($type->id == old('type_id', $drink->type_id)) selected @endif>{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Drink size</label>
                                        <input type="text" class="form-control" name="drink_size" value="{{old('drink_size', $drink->size)}}">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Drink price</label>
                                        <input type="text" class="form-control" name="drink_price" value="{{old('drink_price', $drink->price)}}">
                                    </div>
                                </div>

                                <div class="col-3 drink-vol" id="drink--vol">
                                    <div class="mb-3">
                                        <label class="form-label">Drink VOL</label>
                                        <input type="text" class="form-control" name="drink_vol" value="{{old('drink_vol', $drink->vol)}}">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Drink Photo</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                @if($drink->photo)
                                <div class="col-4">
                                    <div class="mb-3 img">
                                        <img src="{{asset($drink->photo)}}">
                                    </div>
                                </div>
                                @endif

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Drink description</label>
                                        <textarea class="form-control" rows="10" name="drink_desc">{{old('drink_desc', $drink->desc)}}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                        @if($drink->photo)
                        <button type="submit" class="btn btn-outline-danger" name="delete_photo" value="1">Delete Photo</button>
                        @endif
                        @csrf
                        @method('put')
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const alkIds = '{{$alkIds}}';

</script>
@endsection
