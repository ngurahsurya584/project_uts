@extends('layout.t_dash_user')

@section('content')


    <title>Landing Page</title>
    <div>


        <div class="container">
            <div class=" jumbotron">
                <h1 class="display-4 text-center">Anda Bukan Admin :(</h1>

                <div class="card text-center">
                    <div class="card-header">
                        Mohon Maaf :(
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Anda tidak bisa mengakses laman ini karena anda admin.</h5>
                        <p class="card-text">
                            Silahkan kembali yaaa :)
                        </p>
                        <a href="/user" class="btn btn-primary">Lanjut</a>
                    </div>
                    <div class="card-footer text-muted">
                        Have Fun :)
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div> --}}

            </div>
            {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
