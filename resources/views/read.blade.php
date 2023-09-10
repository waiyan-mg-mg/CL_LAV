@extends('custom.box')
{{-- style --}}
@section('boxstyle')
@endsection
{{-- html --}}
@section('box')
    <h1></h1>
    <section class="container">
        <div class="row ">
            <div class="col">
                <div class="contentBox">
                    <a href="{{ route('home') }}"><i class="fs-1 fa-solid fa-caret-left"></i></a>
                    <h3>{{ $singleData['title'] }}</h3>
                    <p>{{ $singleData['content'] }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
