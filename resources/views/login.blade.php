<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="col-md-6 offset-md-3 mt-5">
                    <div class="card shadow">
                        <div class="card-header">LOGIN</div>
                        <div class="card-body">
                            <form action="{{ route('login.submit') }}" method="POST">
                                @csrf
                                <div class="form-group row ">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror  "name="email" id="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">

                                <div class="col-md-12">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror "
                                            name="password" id="password" value="">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-12">
                                        {{-- <a class="btn btn-primary btn-sm" href="{{ route('test.index') }}" role="button"><i
                                                class="fas fa-arrow-left"></i> Back</a> --}}
                                        <button type="submit" class="btn btn-info btn-sm float-right">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
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
