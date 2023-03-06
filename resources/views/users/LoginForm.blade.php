@extends('layout.app')
@section('title', 'Entrar aquí')
@section('content')
    <div class="mt-5">
        <div class="container w-75 mt-4">
            <div class="row justify-content-center mt-2">
                <div class="col-md-8 mx-auto">
                    <form class="justify-content-center text-center mt-5 mx-auto"  action="{{route('dologin')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"  name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control " id="exampleInputPassword1"  name="password">
                        </div>
                        <button type="submit"class="btn btn-primary">Send</button>
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
        </div>
    </div>
@endsection

