@extends('blogs.category.master')

@section('page-content')
<form method="POST" action=" {{ route('categorys.store') }}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-7 bg-white p-5">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5 bg-white p-5">
                <h2>Categories</h2>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" checked name="parent" id="cat_0">
                    <label class="form-check-label" for="cat_0">
                        NO Parent
                    </label>
                </div>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{ $category->id }}" name="parent" id="cat_{{ $category->id }}">
                        <label class="form-check-label" for="cat_{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                    @if($category->children)
                        @include('blogs.category.child', ['children' => $category->children])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</form>    
@endsection