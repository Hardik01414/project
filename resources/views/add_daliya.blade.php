@extends('layout.layout')

@section('title')
    દાળિયા
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <form action="{{ route('add.daliya') }}" method="post">
        @csrf
        <input type="hidden" name="month" value="{{ $month }}">
        <input type="hidden" name="year" value="{{ $year }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <table class="table">
        <thead>
            <tr>
                <th>ફોટો</th>
                <th>નામ</th>
                <th><small>{{ $date."-".$month."-".$year }}</small></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><label for="{{ $user['id'] }}"><img src="{{ $user['image'] }}" height="100px" width="100px"></label></td>
                <td><label for="{{ $user['id'] }}">{{ $user['name'] }}</label></td>
                <td><input type="checkbox" name="daliya[]" id="{{ $user['id'] }}" class="form-check" value="{{ $user['id'] }}"> </td>
            </tr>
        @endforeach
        <tr>
            <th>ઉમેરો</th>
            <th colspan="2"><input type="text" placeholder="દાળી લખો" name="dali">
                <span class="text text-danger">@error('dali')
                    {{ $message }}
                @enderror</span>
                <input type="submit" value="દાળિયા ઉમેરો" name="submit" class="btn btn-primary"></th>
        </tr>
        </tbody>
        </table>
        </form>
    </div>
@endsection
