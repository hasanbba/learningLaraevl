@extends('blogs\master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto bg-white p-5">
        <form method="POST" action=" {{ route('blog.store') }}">
            @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title">
                    @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="5">{{ old('desc') }}</textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>

                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control custom-select" name="category" id="category">
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" id="slug" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection