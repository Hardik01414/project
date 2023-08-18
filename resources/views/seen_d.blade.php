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
                    <div class="col-lg-5">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session()->get('error') }}</div>
                        @endif
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-primary text-white"><h3 class="text-center font-weight-light my-4">તારીખ ઉપર થી  દાળિયા જોવો</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('seen.show') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">વરસ</label>
                                <select class="form-select" name="year">
                                    @foreach ($data as $varas)
                                    <option value="{{ $varas['year'] }}">{{ $varas['year'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">મહિનો</label>
                                <select class="form-select" name="month">
                                    @foreach ($data as $mahino)
                                    <option value="{{ $mahino['month'] }}">{{$mahino['month']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">તારીખ</label>
                                <select class="form-select" name="date">
                                    @foreach ($data as $tarikh)
                                    <option value="{{ $tarikh['date'] }}">{{ $tarikh['date'] }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-footer text-center py-3">
                                <div class="form-group">
                                    <input type="submit" name="submit" value="તારીખ જોવો" class="btn btn-primary">
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
