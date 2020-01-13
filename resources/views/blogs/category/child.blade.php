@foreach ($children as $category)
    <div class="form-check">
        <input class="form-check-input" type="radio" value="{{ $category->id }}" name="parent" id="cat_{{ $category->id }}">
        <label class="form-check-label" for="cat_{{ $category->id }}">
            @for($i=0; $i < count($category->ancestors); $i++)
            {{ '-' }}
            @endfor
            {{ $category->name }}
        </label>
    </div>
    @if($category->children)
        @include('blogs.category.child', ['children' => $category->children])
    @endif
@endforeach