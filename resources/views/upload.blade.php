@extends('layouts.template')

@section('title','Upload-File')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header h1">Upload-File</div>
                    @if (Session::has('file_uploaded'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('file_uploaded') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('store.file') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label  for="file">Choose file</label>

                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

