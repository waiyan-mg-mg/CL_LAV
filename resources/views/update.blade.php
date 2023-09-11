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
                    <form action="{{ route('post#updated') }}" method="GET">
                        <input type="hidden" name="id" value="{{ $new['id'] }}">
                        <input name="title" type="text" value="{{ $new['title'] }}"
                            class="form-control mb-3 form-control-lg">
                        <textarea name="content" cols="30" rows="10" class="form-control mb-3 form-control-lg">{{ $new['content'] }}</textarea>
                        <button class="btn btn-outline-danger">Update</button>
                    </form>
                </div>
            </div>

    </section>
@endsection
