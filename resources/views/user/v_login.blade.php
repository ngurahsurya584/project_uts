@extends('layout/t_admin')

@section('title', 'Login Member')

@section('content')

    <body class="bg-gradient-warning">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login User</h1>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}" class="user">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror form-control-user"
                                                    name="email" aria-describedby="emailHelp"
                                                    placeholder="Masukkan Alamat Email" value="{{ old('email') }}"
                                                    required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror form-control-user"
                                                    name="password" required autocomplete="current-password"
                                                    id="exampleInputPassword" placeholder="Masukkan Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>

                                            <hr>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/register">Belum Punya Akun? Register User!!!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>



    </body>

@endsection
