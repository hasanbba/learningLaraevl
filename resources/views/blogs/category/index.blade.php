@extends('blogs\category\master')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Total Blog</th>
                        <th>Create At</th>
                        <th>Last Update</th>
                        <th class="text-center" style='width:180px;'>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                    <tr>
                        <td scope="row">{{ ++$i }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->blogs_count }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->toDateTimeString() }}</td>
                        <td class="text-center" style='width:180px;'>
                            <form action="{{ route('categorys.destroy',$category->id) }}" method="POST">
                                <a href="{{ route('categorys.show',$category->id) }}" class="btn btn-sm btn-light">View</a>
                                <a href="{{ route('categorys.edit',$category->id) }}" class="btn btn-sm btn-info">Edit</a>
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
                        <td colspan="5">
                            <p class="float-left mb-0">Total user: {{ $categorys->total()}}</p>
                            {{-- <nav aria-label="Page navigation example"> --}}
                                <div class="pagination justify-content-end mb-0">
                                    {{ $categorys->links() }}
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