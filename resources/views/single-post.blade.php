<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>DB CRUD Operation</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Post Details
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input id="title" class="form-control" value="{{ $post->title }}" type="text" name="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="body">Post Description</label>
                                <textarea id="body" class="form-control" name="body" rows="3">{{ $post->body }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- jQuery -->
     <script src="/assets/js/jquery-3.5.1.min.js"></script>
     <script src="/assets/js/popper.min.js"></script>
     <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>
