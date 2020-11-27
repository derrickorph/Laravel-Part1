@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Utilisateurs</div>

                <div class="card-body">
                    <table id="example" class="table  shadow table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôles</th>
                                <th scope="col">Action</th>
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
                                    <td scope="row">{{ implode('- ',$user->roles()->get()->pluck('name')->toArray()) }}</td>

                                    <td class="text-center">
                                        @can('edit-users')

                                        <a href=" {{ route('admin.users.edit', $user->id) }} "><button class="btn btn-warning btn-sm">Edit</button></a>
                                        @endcan

                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user->id )}}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endcan

                                    </td>

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
