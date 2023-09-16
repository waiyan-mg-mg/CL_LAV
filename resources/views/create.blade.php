@extends('custom.box')
@section('boxstyle')
    .single{
    transition:all 0.3s;
    }
    .single:hover{
    background-color:#85c8ff14;
    }
    .single i{
    cursor:pointer;

    }
@endsection
@section('box')
    <section class="container pt-5">
        <div class="row">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="col-md-5">
                {{-- message here --}}
                {{-- for create --}}
                @if (session('alertCreate'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alertCreate') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- for delete --}}
                @if (session('alertDelete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('alertDelete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- for update --}}
                @if (session('alertUpdate'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('alertUpdate') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- message end --}}
                <form class="p-2" action="{{ route('post#create') }}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{ old('title') }}" name='title'
                            class="form-control @error('title') is-invalid @enderror" id="title"
                            aria-describedby="title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div id="title" class="form-text">Title can't longer be more than 255 characters.</div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea value="{{ old('content') }}" name='content' class="form-control @error('content') is-invalid @enderror"
                            id="content" rows="3"></textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-7">
                <div class="contents-box ">
                    @foreach ($datas as $data)
                        <div class="single p-2 shadow mb-4 rounded-3">
                            <h3>{{ $data['title'] }}</h3>
                            <p class="text-muted">{{ Str::limit($data['content'], 150, '.......') }}</p>
                            <div class="d-flex justify-content-end fs-1">
                                <a href="{{ url('delete/' . $data['id']) }}"> <i
                                        class="me-4  text-danger fa-solid fa-trash"></i></a>

                                <a href="{{ route('post#read', $data['id']) }}"> <i
                                        class="text-success  fa-solid fa-book"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $datas->links() }}
            </div>
        </div>
    </section>
@endsection
