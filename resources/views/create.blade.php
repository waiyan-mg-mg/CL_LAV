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
            <div class="col-md-5">
                <form class="p-2" action="" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name='title' class="form-control" id="title" aria-describedby="title">
                        <div id="title" class="form-text">Title can't longer be more than 255 characters.</div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Password</label>
                        <textarea name='content' class="form-control" id="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-7">
                <div class="contents-box ">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="single p-2 shadow mb-4 rounded-3">
                            <h3>title</h3>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quisquam quis
                                fugiat repellendus
                                est
                                explicabo quo quia, inventore modi esse consequatur atque beatae.</p>
                            <div class="d-flex justify-content-end fs-2">
                                <i class="me-4 text-danger fa-solid fa-trash"></i>
                                <i class="text-success fa-solid fa-book"></i>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection
