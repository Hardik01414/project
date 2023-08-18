<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('resources/jquery/jquery-3.7.0.min.js') }}"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">

                <main>
                <form action="{{ route('login_check') }}" method="post" autocomplete="off">
                @csrf
                    <div class="container">
                        @if (session()->has('error'))
                        <div class="alert alert-danger mt-5">{{ session()->get('error') }}</div>
                    @endif
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-floating mb-3">
                                                <label for="inputEmail">Name</label>
                                                <input class="form-control" name="name" id="inputEmail" type="text"  />

                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control" name="password" id="inputPassword" type="text" />

                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="લૉગિન કરો" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </main>
            </div>

        </div>
        <script src="{{ asset('resources/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('resources/js/scripts.js') }}"></script>
    </body>
</html>

