@extends('datatable.template.layout')

@section('content')
    <div class="container-fluid">
        @if (session()->has('alert'))
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col">
                <h2>Liste des utilisateurs</h2>
            </div>
            <div class="col ">
                <a class="addUser btn btn-success btn-sm float-right">Ajouter un utilisteur</a>

            </div>
        </div>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($tests as $test)
                <tr id="sid{{ $test->id }}">
                    <td scope="row" ><?= $i++ ?></td>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->firstname }}</td>
                    <td>{{ $test->email }}</td>
                    <td>{{ $test->created_at }}</td>
                    <td>{{ $test->updated_at }}</td>
                    <td class="text-center">

                        <a href="javascript:void(0)" onclick="editionUser({{ $test->id }})" class="editUser btn btn-warning btn-sm ">Editer</a>
                        <a data-id='{{ $test->id }}'  class=" deleteUser btn btn-danger btn-sm">supprimer</a>
                    </td>

                 </tr>
            @endforeach
        </tbody>
    </table>
        <!--Barre de Progression-------------------- -->
        <div class="row my-5">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header">
                      <h1 class="text-center">BARRE DE PROGESSION DYNAMIQUE EN HTML 5</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="my-5" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="file">Example file input</label>
                                <input type="file"  class="form-control-file" id="file" name="file">
                                </div>
                                <input type="button" class="form-control btn btn-primary btn-sm" value="Upload File" onclick="uploadFichier()">
                            </div>
                            <progress id="progressBar" value="0" max="100" style="width:100%; height:30px" class=" mt-5 "></progress>
                            <div class="form-group">
                                <h2 id="status"></h2>
                                <h5 id="status_bytes"></h5>
                            </div>

                                {{-- <div class="progress mt-4">
                                    <div class="progress-bar progress-bar-striped" id="progressBar" role="progressbar" style="width: 50%" aria-valuenow="10" value aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div> --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!-------------------------------->


        <!-- Add User Modal -->
        <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h2 class="modal-title text-center">Ajouter d'utilisateur</h2>
                        <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    <div class="modal-body">
                        <form id="add-form" action="{{ route('test.store')}}" method="POST" data-ajax-form>
                            @csrf
                            <div class="form-group row ">

                                <div class="col-md-12">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control " name="name"
                                        name="name" id="name" data-ajax-input="name" value="{{ old('name') }}">

                                    <div class="invalid-feedback" data-ajax-feedback="name"></div>

                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="firstname">Prénoms</label>
                                    <input type="text" class="form-control "
                                        name="firstname" id="firstname" data-ajax-input="firstname"
                                        value="{{ old('firstname') }}">
                                    <div class='invalid-feedback' data-ajax-feedback="firstname"></div>

                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        id="email" data-ajax-input="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback" data-ajax-feedback="email"></div>

                                </div>
                            </div>

                            <div class="modal-footer form-group row ">
                                <div class="col-md-12">
                                    <a class="btn btn-primary btn-sm " role="button" data-dismiss="modal"><i
                                            class="fa fa-arrow-left"></i> Retour</a>
                                    <button type="submit" id="submit"  name="submit" class=" btn btn-success btn-sm float-right">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h2 class="modal-title text-center">Modifier d'utilisateur</h2>
                        <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form" name="edit-form"  >
                            @csrf
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <input type="hidden" name="userEditId" id="userEditId" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row ">

                                <div class="col-md-12">
                                    <label for="nameUser">Nom</label>
                                    <input type="text" class="form-control " name="nameUser" id="nameUser" data-edit-input="name" >
                                    <div class="invalid-feedback" data-edit-feedback="name"></div>

                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="firstnameUser">Prénoms</label>
                                    <input type="text" class="form-control " name="firstnameUser" id="firstnameUser" data-edit-input="firstname" value="{{ old('firstname') }}">
                                    <div class='invalid-feedback' data-edit-feedback="firstname"></div>

                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="emailUser">Email</label>
                                    <input type="email" class="form-control" name="emailUser" id="emailUser" data-edit-input="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback" data-edit-feedback="email"></div>

                                </div>
                            </div>
                            <div class="modal-footer form-group row ">
                                <div class="col-md-12">
                                    <a class="btn btn-primary btn-sm " role="button" data-dismiss="modal"><i
                                            class="fa fa-arrow-left"></i> Retour</a>
                                    <button type="submit" id="editSubmit"  name="editSubmit" class=" btn btn-warning btn-sm float-right">Enregistrer les modification</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete User Modal -->
        <div class="modal fade " id="deleteUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog ">

                <div class="modal-content bg-danger">
                    <div class="modal-header ">
                        <h2 class="modal-title text-center">  Supprimer un utilisateur</h2>
                        <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    <div class="modal-body bg-light">
                        <h5 class="card-title text-center mb-3">Etes-vous sûr(e) de vouloir supprimer cet utilisateur  ?</h5>
                        <form   method="POST" id="delete-form" >
                            @csrf
                            <input type="hidden" name="userId" id="userId" class="form-control">
                            <div class="modal-footer form-group row  ">
                                <div class="col-md-12">
                                    <a class="btn btn-warning btn-sm " role="button" data-dismiss="modal"><i
                                            class="fa fa-arrow-left"></i> Annuler</a>
                                    <button type="submit" id="delete"  name="submit" class=" btn btn-danger btn-sm float-right">Oui, supprimer</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script>
            function _(elmnt) {
                return document.getElementById(elmnt);
            }
            function uploadFichier() {
            var file= _('file').files[0];
            var data= new FormData();
            data.append('file',file);

            var ajax= new XMLHttpRequest();
            ajax.upload.addEventListener("progress",progressHandler,false);
            ajax.addEventListener("load",completeHandler,false);
            ajax.addEventListener("error",errorHandler,false);
            ajax.addEventListener("abort",abortHandler,false);
            ajax.open("post","/progress");
            ajax.send(data);
            // alert(file.name);
            }
            function progressHandler(event) {
                _('status_bytes').innerHTML= event.loaded + '  bytes uploaded by  '+ event.total;
                    var pourcentage= (event.loaded / event.total)*100;
                    _('progressBar').value= Math.round(pourcentage);
                    _('status').innerHTML=Math.round(pourcentage)+' % uploaded... Patientez';
            }
            function completeHandler(event) {

            _('status').innerHTML= event.target.responseText;
            _('progressBar').value= 0;

            }
            function errorHandler() {
                _('status').innerHTML="Chargement échoué";
            }
            function abortHandler() {
                _('status').innerHTML="Chargement annulé";

            }
            /*
            |============Add-Ajax==================|
            */
            $(document).ready(function() {
                $('#example').DataTable({});
                $('.addUser').click(function() {
                    $('#addUser').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                });

                $(document).on('submit', '[data-ajax-form]', function(event) {
                    event.preventDefault();

                    var form = $(this);
                    var submit = $(this).find(':submit');
                    if (form.data('ajax-form') !== 'submitted') {

                        form.attr('data-ajax-form','submitted');
                    }
                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: new FormData(form[0]),
                        beforeSend: function () {

                            $('#submit').addClass('d-flex align-items-center');
                            $('#submit').prop('disabled',true);


                        $('#submit').html('<strong>Enregistrer...</strong><span class=" spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></span>');
                        },
                        complete: function () {

                            $('#submit').html('Enregistrer');
                            $('#submit').removeClass('d-flex align-items-center');
                            $('#submit').prop('disabled',false);


                        },

                        contentType:false,
                        processData:false,

                        success: function(response) {
                            $('#add-form')[0].reset();

                            $('[data-ajax-input]').removeClass('is-invalid');
                            $('[data-ajax-feedback]').html('').removeClass('d-block');


                            // location.reload();
                        },
                        error: function(response) {
                            // alert(response.responseJSON.message);
                            $('[data-ajax-input]').removeClass('is-invalid');
                            $('[data-ajax-feedback]').html('').removeClass('d-block');
                            if (response.responseJSON.hasOwnProperty('errors')) {
                                $.each(response.responseJSON.errors,function (key,value) {
                                    $('[data-ajax-input="'+key + '"]').addClass('is-invalid');
                                    $('[data-ajax-feedback="'+key + '"]').html(value[0]).addClass('d-block');
                                })
                            }

                        }
                    });
                });
            });

        </script>
        <script>
                /*
            |============Edit-Ajax==================|
            */
            function editionUser(id)
            {
                $.get('/testEdit/'+id, function name(test) {
                    $("#userEditId").val(test.id);
                    $("#nameUser").val(test.name);
                    $("#firstnameUser").val(test.firstname);
                    $("#emailUser").val(test.email);
                    // $('#editUser').modal({backdrop: 'static',keyboard: false});
                    $('#editUser').modal('toggle');
                })
            }

            $('#edit-form').submit(function(event) {
                event.preventDefault();
                let _token=$('input[name=_token]').val();
                let id=$("#userEditId").val();
                let name=$("#nameUser").val();
                let firstname=$("#firstnameUser").val();
                let email=$("#emailUser").val();

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':"{{ csrf_token() }}"
                    }
                });
                $.ajax({
                    type: 'PUT',
                    url:"{{route('update.user')}}",
                    dataType: 'json',
                    data: {
                        id: id,
                        name: name,
                        firstname: firstname,
                        email: email,
                        _token:_token,

                    },
                    beforeSend: function () {

                        $('#editSubmit').addClass('d-flex align-items-center');
                        $('#editSubmit').prop('disabled',true);
                        $('#editSubmit').html('<strong>Enregistrer les modification...</strong><span class=" spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></span>');
                    },
                    complete: function () {

                        $('#editSubmit').html('Enregistrer les modification');
                        $('#editSubmit').removeClass('d-flex align-items-center');
                        $('#editSubmit').prop('disabled',false);
                    },
                    processData:true,

                    success: function(response) {
                        $('tr#sid' + response.id +' td:nth-child(2)').text(response.name);
                        $('tr#sid' + response.id +' td:nth-child(3)').text(response.firstname);
                        $('tr#sid' + response.id +' td:nth-child(4)').text(response.email);
                        $('[data-edit-input]').removeClass('is-invalid');
                        $('[data-edit-feedback]').html('').removeClass('d-block');
                        $('#editUser').modal('toggle');
                        $('#edit-form')[0].reset();
                        //  location.reload();
                    },
                    error: function(response) {
                            console.log(response);
                        $('[data-edit-input]').removeClass('is-invalid');
                        $('[data-edit-feedback]').html('').removeClass('d-block');
                            if (response.responseJSON.hasOwnProperty('errors')) {
                            $.each(response.responseJSON.errors,function (key,value) {
                                $('[data-edit-input="'+key + '"]').addClass('is-invalid');
                                $('[data-edit-feedback="'+key + '"]').html(value[0]).addClass('d-block');
                            })
                        }
                    }
                });
            });
        </script>
        <script>
                /*
            |============Delete-Ajax==================|
            */
            $(document).ready(function() {
                $('.deleteUser').click(function() {
                    $('#deleteUser').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#userId").val($(this).data('id'));

                });


                $(document).on('submit', '#delete-form', function(e) {
                    e.preventDefault();
                    let id=$("#userId").val();
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':"{{ csrf_token() }}"
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/test/'+id+'/delete',

                        data: {
                            'id': id
                        },
                        beforeSend: function () {
                            $('#delete').addClass('d-flex align-items-center');
                            $('#delete').prop('disabled',true);

                            $('#delete').html('<strong>Oui, supprimer...</strong><span class=" spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></span>');
                        },
                        complete: function () {

                            $('#delete').html('Oui, supprimer');
                            $('#delete').removeClass('d-flex align-items-center');
                            $('#delete').prop('disabled',false);

                        },
                        contentType:false,
                        processData:false,
                        success: function(response) {
                            $('#userId').val('');
                            location.reload();
                        },
                        error: function($xhr, textStatus, errorThrown) {
                            console.log($xhr.responseJSON.message);
                        }
                    });

                });
            });
        </script>
    @endsection
