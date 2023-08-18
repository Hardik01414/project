@extends('layout.layout')
@section('title')
    નવું દાળિયું
@endsection

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">

        <main>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-primary text-white"><h3 class="text-center font-weight-light my-4">નવા દાળિયા ઉમેરો</h3>
                            @if (session()->has('result'))
                                <div class="alert alert-success">{{ session()->get('result') }}</div>
                            @endif
                            </div>
                            <div class="card-body">
                            <form action="{{ route('add.new.d') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="name">નામ</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="name" placeholder="દાળિયા નું નામ લખો">
                                    <span class="text text-danger">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="password">પાસવર્ડ</label>
                                    <input type="text" value="{{ old('password') }}" class="form-control" name="password" id="password" placeholder="દાળિયા નો પાસવર્ડ લખો">
                                    <span class="text text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="address">સરનામું</label>
                                    <textarea name="address" id="address" class="form-control" placeholder="દાળિયા નું સરનામું લખો">{{ old('address') }}</textarea>
                                    <span class="text text-danger">
                                        @error('address')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="file">દાળિયા નો ફોટો</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <span class="text text-danger">
                                        @error('image')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                    @if (session()->has('image'))
                                    <div class="alert alert-danger">{{ session()->get('image') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="type">દાળિયા નો પ્રકાર</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="daliya">દાળિયા</option>
                                        <option value="rasoya">રસોયા</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="form-group">
                                    <input type="submit" name="submit" value="લૉગિન કરો" class="btn btn-primary">
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
