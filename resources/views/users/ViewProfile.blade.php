@extends('layout.app')
@section('title', 'Ver perfil')
@section('content')

    <div style="margin-top: 80px; text-align: center; ">
        @if(!is_null(Auth::user()->profile_image))
            <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="Profile Image" width="250" height="250" style="border: 3px solid gray;border-radius: 90%;">
        @endif
    </div>
    <div>
        <h2>Aqui mostraré las clases del alumno y otros datos</h2>
    </div>

@endsection

----------------------------------
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
@endsection




