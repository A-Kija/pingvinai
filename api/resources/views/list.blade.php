@extends('app')

@section('content')
<ul>
    @foreach($products as $product)

    <li>
    {{$product->title}}
    <img src="{{$product->thumbnail}}">
    <a href="{{route('category', $product->category)}}">{{$product->category}}</a>
    
    </li>

    @endforeach

</ul>

@endsection
