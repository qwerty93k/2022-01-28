@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($profileImages as $image)
    {{-- pilnas kelias 
            <img id='{{$image->id}}' class="{{$image->class}}" src="{{asset('/images/$image->src)}}" alt="{{$image->alt}}" class="{{$image->width}}" height="{{$image->height}}">    
    --}}


    {{-- reliatyvus kelias --}}
        <img id='{{$image->id}}' class="{{$image->class}}" src="/images/{{$image->src}}" alt="{{$image->alt}}" class="{{$image->width}}" height="{{$image->height}}">
    @endforeach
</div>

@endsection