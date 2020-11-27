@extends('layouts.template')

@section('title','Users')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des Utilisateurs</div>

                    <div class="card-body">
                        <table id="example" class="table  shadow table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp

                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row" ><?= $i++ ?></th>
                                        <td scope="row">{{ $user->name }}</td>
                                        <td scope="row">{{ $user->email }}</td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

