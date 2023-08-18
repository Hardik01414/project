@extends('layout.layout')

@section('title')
    દાળિયા
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <table class="table">
        <thead>
            <tr>
                <th>ફોટો</th>
                <th>નામ</th>
                <th><b>ટોટલ દાળિયા:  </b>{{ $result['total_d'] }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $user)
            <tr>
                <td><img src="{{ $user->image }}" height="100px" width="100px"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $result['date']."-".$result['month']."-".$result['year'] }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
@endsection
