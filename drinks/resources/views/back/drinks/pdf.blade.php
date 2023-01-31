<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$drink->title}}</title>
    <style>
        .mb-3 {
            margin: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .img img {
            height: 400px;
            width: auto;
        }
    </style>
</head>
<body>
    <h1>{{$drink->title}}</h1>
    <div class="mb-3">
        <label class="form-label">Drink type</label>
        {{$drink->drinkType?->title}}
    </div>
    <div class="mb-3">
        <label class="form-label">Drink size</label>
        {{$drink->size}} ml
    </div>
    <div class="mb-3">
        <label class="form-label">Drink price</label>
        {{$drink->price}} Eur
    </div>
    @if($drink->vol)
    <div class="mb-3">
        <label class="form-label">Drink VOL</label>
        {{$drink->vol}} %
    </div>
    @endif
    <div class="mb-3">
        <label class="form-label">Drink description</label>
        <div>
            {{$drink->desc}}
        </div>
    </div>
    @if($drink->photo)
    <div class="mb-3 img">
        <img src="{{asset($drink->photo)}}">
    </div>
    @endif
</body>
</html>