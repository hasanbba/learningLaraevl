@extends('blogs\category\master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto bg-white p-5">
        <form method="POST" action=" {{ route('categorys.update', $category->id) }}">
            @csrf   @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
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