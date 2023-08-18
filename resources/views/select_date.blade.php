@extends('layout.layout')

@section('title')
    તારીખ
@endsection

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">

        <main>

            <div class="container">
                <div class="row justify-content-center">
                    @if (session()->has('dali'))
                        <div class="alert alert-danger">{{ session()->get('dali') }}</div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-alert">{{ session()->get('error') }}</div>
                    @endif
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-primary text-white"><h3 class="text-center font-weight-light my-4">તારીખ અને દાળિયા ઉમેરો</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('selected.date') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">વરસ</label>
                                <select class="form-select" name="year">
                                    @foreach ($year as $varas)
                                    <option value="{{ $varas['year'] }}">{{ $varas['year'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">મહિનો</label>
                                <select class="form-select" name="month">
                                    @foreach ($month as $mahino)
                                    <option value="{{ $mahino['id'] }}">{{$mahino['id']."-". $mahino['month'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">તારીખ</label>
                                <select class="form-select" name="date">
                                    @foreach ($date as $tarikh)
                                    <option value="{{ $tarikh['date'] }}">{{ $tarikh['date'] }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-footer text-center py-3">
                                <div class="form-group">
                                    <input type="submit" name="submit" value="તારીખ ઉમેરો" class="btn btn-primary">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection
