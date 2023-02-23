@extends('layout.app')
@section('title', 'Group')
@section('content')


    <table class="table" id="table-reserve">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Group</th>
            <th scope="col">Year</th>
            <th scope="col">Description</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($groups as $row)
                <tr>
                    <td scope="row">{{ $row->id }}</td>
                    <td> {{ $row->group }}</td>
                    <td> {{ $row->year }}</td>
                    <td> {{$row->description}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
