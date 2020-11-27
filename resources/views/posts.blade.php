<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Posts</title>
</head>
<body>
    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-primary">
                        <span class="text-primary h2">All Posts</span>
                        <a href="/add-post" class="btn btn-success btn-sm float-right">Ajouter</a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('post_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('post_deleted') }}
                            </div>
                        @endif
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Post Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($posts as $post)
                                    <tr>
                                        <td scope="row" ><?= $i++ ?></th>
                                        <td scope="row">{{ $post->title }}</td>
                                        <td scope="row ">{{ Str::of($post->body)->substr(0,100)}}</td>

                                        <td scope="row" class="text-center">
                                            <a href="/posts/{{ $post->id }}" class="btn btn-primary btn-sm ">View</a>
                                            <a href="/edit-post/{{ $post->id }}" class="btn btn-warning my-3 btn-sm">Edit</a>
                                            <a href="/delete-post/{{ $post->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>

                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
