<!doctype html>
<html lang="en">
  <head>
    <title>Blog Crud</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .pagination{
            border-radius: 0px !important;
        }
        .page-item:first-child .page-link{
            border-radius: 0px !important;
        }
        .page-item:last-child .page-link{
            border-radius: 0px !important;
        }
        .page-link{

        }
    </style>
  </head>
  <body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    <a class="navbar-brand text-uppercase" href="{{ url('/') }}">Home</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('blog.index') }}">CRUD With Blog <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categorys.index') }}">Category</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User Management</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">role</a>
                                    <a class="dropdown-item" href="#">permission</a>
                                    <a class="dropdown-item" href="#">User</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 d-flex justify-content-end">
                <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary mr-3">Add New</a>
                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary mr-3">All Post</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert" id="successMessage">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    @yield('page-content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            </div>
        </div>
    </div>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            // setTimeout() function will be fired after page is loaded
            // it will wait for 5 sec. and then will fire
            // $("#successMessage").hide() function
            setTimeout(function() {
                $("#successMessage").hide('blind', {}, 500)
            }, 5000);
        });

        $("#title").keyup(function () {
            var str = $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase())

        })
    </script>
  </body>
</html>