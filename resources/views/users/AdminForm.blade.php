@extends('layout.app')
@section('title', 'Ver perfil')
@section('content')
<div class="mt-5">
    <div class="container mt-5">
        <div class="row-mt-5">
            <div class="col-md-4 sm-4 ml-4  mb-4 mt-4">
                <div class="card text-bg-success mb-3">
                    <form action="{{ route('edit-user', ['id' => Auth::user()->id]) }}" method="POST" id="change">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" style="background-color:deepskyblue;" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" style="background-color:deepskyblue;" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary" id="but">Cambiar contraseña</button>
                        @if ($errors->any())
                            <div class="alert alert-danger d-flex justify-content-center">
                                <ul class="text-center">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-4 sm-4 ml-4  mb-4 mt-4">
                <div class="card text-bg-danger mb-3">
                    <form id="change2">
                        <p>Eliminar Usuario</p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash3-fill"> Delete </i>
                        </button>
                </div>
            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete your user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="delete-user-now" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="delete-user-now" action="{{route('delete-user', ['id' => Auth::user()->id])}}" method="POST" >
                        @method('DELETE')
                        @csrf
                    </form>

            <div class="col-md-4 sm-4 ml-4  mb-4 mt-4">
                <div class="card text-bg-success mb-3">
                    <form action="{{ route('up', ['id' => Auth::user()->id]) }}" method="POST" id="change3" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label for="profile_image">Foto de perfil</label>
                        <input type="file" name="profile_image" id="profile_image">
                        <button type="submit" class="btn btn-primary" id="but">Enviar imagen</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 sm-4 ml-4  mb-4 mt-4">
                <div class="card text-bg-danger mb-3">
                    <form id="change4">
                        <p>Eliminar foto de perfil</p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalImage">
                            <i class="bi bi-trash3-fill"> Delete </i>
                        </button>
                </div>
            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Photo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the profile image?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="deleteFormImage" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="deleteFormImage" action="{{route('delete-image', ['id' => Auth::user()->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
        </div>
    </div>
</div>


@endsection

