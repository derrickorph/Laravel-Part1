@extends('datatable.template.layout')


@section('content')
  {{ $dataTable->table(['class' => 'table table-bordered table-hover table-sm'], true) }}
  @if(Route::currentRouteName() === 'users')
    <a class="btn btn-primary" href="{{ route('pays.create') }}" role="button">Créer un nouveau pays</a>
  @endif
@endsection
@section('js')
  {{ $dataTable->scripts() }}
@endsection

