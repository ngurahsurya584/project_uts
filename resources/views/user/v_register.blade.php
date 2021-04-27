@extends('layout.t_admin')

@section('title', 'Register Member')

@section('content')

    <body class="bg-gradient-danger">

        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @enderror form-control-user"
                                            id="exampleFirstName" name="name" value="{{ old('name') }}" required
                                            autocomplete="name" autofocus placeholder="Masukkan Nama Anda">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror form-control-user"
                                            id="exampleInputEmail" name="email" value="{{ old('email') }}" required
                                            autocomplete="email" placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror form-control-user"
                                                name="password" required autocomplete="new-password"
                                                id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                name="password_confirmation" required autocomplete="new-password"
                                                id="password-confirm" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Sudah Punya Akun? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
@endsection
