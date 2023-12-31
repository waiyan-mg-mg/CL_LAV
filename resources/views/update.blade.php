@extends('custom.box')
{{-- style --}}
@section('boxstyle')
@endsection
{{-- html --}}
@section('box')
    <h1></h1>
    <section class="container ">
        <div class="row ">
            <div class="col-md-6 offset-3 bg-light p-3 rounded-2 shadow-lg">
                <div class="contentBox">
                    <form action="{{ route('post#updated') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="overflow-hidden">
                            @if ($new['image_url'])
                                <img src="{{ asset('storage/' . $new['image_url']) }}" class="w-50 d-block mx-auto">
                            @else
                                <img src="{{ asset('default_‫img.jpg') }}" class="w-50 d-block mx-auto">
                            @endif
                            <div class="mb-3">
                                <label class="form-label text-warning">Change or add above photo::</label>
                                <input class="form-control" type="file" name="image_url">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $new['id'] }}">
                        <input name="title" type="text" value="{{ $new['title'] }}"
                            class="form-control mb-3 form-control-lg">
                        <textarea name="content" cols="30" rows="10" class="form-control mb-3 form-control-lg">{{ $new['content'] }}</textarea>
                        <input type="text" value="{{ $new['address'] }}" name='address' class="mb-3 form-control w-50">
                        <div class="input-group mb-3 w-50">
                            <input min="100" type="number" value="{{ $new['price'] }}" name='price'
                                class=" form-control">
                            <span class="input-group-text">$$</span>
                        </div>
                        <input type="range" name="rating" class="rounded-2 bg-danger p-3 mb-3 form-range" min="0"
                            max="5" step="1" id="rating">
                        <button class="btn btn-outline-danger">Update</button>
                    </form>
                </div>
            </div>

    </section>
@endsection
