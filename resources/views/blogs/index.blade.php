@extends('blogs\master')

@section('page-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Slug</th>
                        <th>Cat</th>
                        <th>Create At</th>
                        <th class="text-center" style='width:180px;'>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td scope="row">{{ ++$i }}</td>
                        <td>{{ substr($blog->title, 0 ,30) }} {{ strlen($blog->title) > 30 ? "...": "" }}</td>
                        <td>{{ substr($blog->desc, 0, 50) }} {{ strlen($blog->desc) > 50 ? "...": ""}}</td>
                         <td>{{ $blog->slug }}</td>
                         <td>{{ $blog->category->name }}</td>
                         <td>{{ date('M j,Y, h:i a' , strtotime($blog->created_at)) }}</td>
                        <td class="text-center" style='width:180px;'>
                            <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-sm btn-light">View</a>
                                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                                @csrf
				                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <p class="float-left mb-0">Total user: {{ $blogs->total()}}</p>
                            {{-- <nav aria-label="Page navigation example"> --}}
                                <div class="pagination justify-content-end mb-0">
                                    {{ $blogs->links() }}
                                </div>
                            {{-- </nav> --}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
    
@endsection