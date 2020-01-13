<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 6 Crud operation using ajax(Real Programmer)</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        
    <div class="container p-4 mt-4">
        <a class="btn btn-sm btn-success my-5" href="javascript:void(0)" id="createNewBook"> Create New Book</a>
        <a class="btn btn-sm btn-success my-5 float-right" href="{{ url('/') }}">Back to home</a>
        <table class="table table-bordered data-table table-stripe bg-white">
            <thead>
                <tr class="bg-dark text-white">
                    <th width="70px">No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th width="180px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookForm" name="bookForm" class="form-horizontal">
                        <input type="hidden" name="book_id" id="book_id">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-12">
                                <textarea id="author" name="author" required placeholder="Enter Author" class="form-control"></textarea>
                            </div>
                        </div>
        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="show" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading2"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control-plaintext" id="titlev" value="">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-12">
                                <textarea id="authorv" class="form-control-plaintext"></textarea>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
    <script type="text/javascript">

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: false,
                serverSide: true,
                // ajax: "{{ route('books.index') }}",
                ajax: '/books',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'author', name: 'author'},
                    {data: 'action', name: 'action', class:'text-center', orderable: false, searchable: false},
                ]
            });
            $('#createNewBook').click(function () {
                $('#saveBtn').val("create-book");
                $('#book_id').val('');
                $('#bookForm').trigger("reset");
                $('#modelHeading').html("Create New Book");
                $('#ajaxModel').modal('show');
            });
            $('body').on('click', '.editBook', function () {
                var book_id = $(this).data('id');
                $.get("{{ route('books.index') }}" +'/' + book_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Book");
                    $('#saveBtn').val("edit-book");
                    $('#ajaxModel').modal('show');
                    $('#book_id').val(data.id);
                    $('#title').val(data.title);
                    $('#author').val(data.author);
                })
            });

            $('body').on('click', '.showBook', function () {
                var book_id = $(this).data('id');
                $.get("{{ route('books.index') }}" +'/' + book_id , function (data) {
                    $('#modelHeading2').html("Show Book");
                    $('#show').modal('show');
                    $('#book_idv').val(data.id);
                    $('#titlev').val(data.title);
                    $('#authorv').val(data.author);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');
            
                $.ajax({
                    data: $('#bookForm').serialize(),
                    url: "{{ route('books.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                
                        $('#bookForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });
            
            $('body').on('click', '.deleteBook', function () {
                var book_id = $(this).data("id");
                if(confirm("Are You sure want to delete !")){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('books.store') }}"+'/'+book_id,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                }else{
                    return;
                }
            });
            
        });
    </script>
    </body>
</html>