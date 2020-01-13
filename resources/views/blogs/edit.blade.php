@extends('blogs.master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto bg-white p-5">
        <form method="POST" action=" {{ route('blog.update', $blog->id) }}">
            @csrf   @method('PUT')

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="title" value="{{ $blog->title }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="desc" id="desc" rows="5">{{ $blog->desc }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection