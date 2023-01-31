@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Show drink</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink title</label>
                                    {{$drink->title}}
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink type</label>
                                    {{$drink->drinkType?->title}}
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink size</label>
                                    {{$drink->size}} ml
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink price</label>
                                    {{$drink->price}} Eur
                                </div>
                            </div>

                            @if($drink->vol)
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink VOL</label>
                                    {{$drink->vol}} %
                                </div>
                            </div>
                            @endif

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Drink description</label>
                                    <div>
                                    {{$drink->desc}}
                                    </div>
                                </div>
                            </div>

                            @if($drink->photo)
                            <div class="col-12">
                                <div class="mb-3 img">
                                    <img src="{{asset($drink->photo)}}">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <a href="{{route('drinks-pdf', $drink)}}" class="btn btn-outline-primary">Download PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
