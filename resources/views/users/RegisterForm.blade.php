@extends('layout.app')
@section('title', 'Regístrate como alumno')
@section('content')
    <div class="mt-5">
        <div class="container w-75 mt-4">
            <div class="row justify-content-center mt-2">
                <div class="col-md-8 mx-auto">
                        <form  class="justify-content-center text-center mt-5 mx-auto" action="{{route('register.store')}}" method="POST"">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputNick" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="exampleInputNick"  name="name">
                            </div>
                            <div class="mb-3" >
                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                <div id="emailHelp" class="form-text">No se compartirá con nadie.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </form>
                    @if ($errors->any())
                        <div class="alert alert-danger d-flex justify-content-center">
                            <ul class="text-center">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


