@extends('datatable.template.layout')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('test.store')}}" method="POST">
                            @csrf
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="firstname">Prénoms</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                        name="firstname" id="firstname" value="{{old('firstname')}}">
                                    @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <a class="btn btn-primary btn-sm" href="{{ route('test.index') }}" role="button"><i
                                            class="fas fa-arrow-left"></i> Back</a>
                                    <button type="submit" class="btn btn-success btn-sm float-right">Ajouter
                                        utilisateur</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
