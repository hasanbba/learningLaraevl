@extends('blogs\master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto bg-white p-5 shadow-sm">
            <form>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $blog->title }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $blog->desc }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $blog->category->name }}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
