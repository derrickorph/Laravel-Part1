@extends('datatable.template.layout')

@section('content')
  <div class="container-fluid">

    <div class="row">
        <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
          <div class="card text-white bg-dark mb-3">
            <h5 class="card-title text-center mb-3">Vous êtes sur le point de supprimer l'utilisateur "<strong>{{ $test->name }}</strong>"</h5>

            <div class="card-body">
                <form  action="{{route('destroyUserTest', $test->id)}}" method="POST" >
                    @csrf
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$test->id}} ">
                    <button type="submit" class="btn btn-danger btn-block btn-sm">Je confirme la suppression</button>
                      {{-- <a class="btn btn-danger btn-lg btn-block" href="#" role="button"
                      onclick="event.preventDefault();
                      $('#userList').submit();"
                      >Je confirme la suppression</a> --}}
                  </form>

            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
