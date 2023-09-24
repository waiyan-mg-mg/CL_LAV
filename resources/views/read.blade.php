@extends('custom.box')
{{-- style --}}
@section('boxstyle')
@endsection
{{-- html --}}
@section('box')
    <section class="container ">
        <div class="row ">
            <div class="col-md-6 offset-3 bg-light p-3 rounded-2 shadow-lg">
                <div class="contentBox">
                    <a href="{{ route('home') }}"><i class="fs-1 fa-solid fa-caret-left"></i></a>
                    <h3 class="text-center">{{ $singleData['title'] }}</h3>
                    <p>{{ $singleData['content'] }}</p>
                    <span>Price: {{ $singleData['price'] }}</span> | <span>Address: {{ $singleData['address'] }}</span> |
                    <span>rating: {{ $singleData['rating'] }}</span>
                </div>
                <div class="overflow-hidden">
                    @if ($singleData['image_url'])
                        <img src="{{ asset('storage/' . $singleData['image_url']) }}" class="w-50 d-block mx-auto">
                    @else
                        <img src="{{ asset('default_‫img.jpg') }}" class="w-50 d-block mx-auto">
                    @endif
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('post#update', $singleData['id']) }}" class="btn btn-outline-success">Update</a>
                </div>
            </div>
        </div>

    </section>
@endsection
