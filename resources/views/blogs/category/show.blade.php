@extends('blogs\category\master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto bg-white p-5 shadow-sm">
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $category->name }}</p>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Blogs</label>
                    <div class="col-sm-10">
                        @foreach ($category->blogs as $blog)
                            <p class="form-control-plaintext">{{ $blog->title }}</p>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection