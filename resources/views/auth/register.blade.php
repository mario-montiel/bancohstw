@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="cli_nom" class="col-md-4 col-form-label text-md-right">{{ __('cli_nom') }}</label>

                            <div class="col-md-6">
                                <input id="cli_nom" type="text" class="form-control @error('cli_nom') is-invalid @enderror" name="cli_nom" value="{{ old('cli_nom') }}" required autocomplete="cli_nom" autofocus>

                                @error('cli_nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('cli_ap_paterno') }}</label>

                            <div class="col-md-6">
                                <input id="cli_ap_paterno" type="text" class="form-control @error('cli_ap_paterno') is-invalid @enderror" name="cli_ap_paterno" value="{{ old('cli_ap_paterno') }}" required autocomplete="cli_ap_paterno" autofocus>

                                @error('cli_ap_paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('cli_ap_materno') }}</label>

                            <div class="col-md-6">
                                <input id="cli_ap_materno" type="text" class="form-control @error('cli_ap_materno') is-invalid @enderror" name="cli_ap_materno" value="{{ old('cli_ap_materno') }}" required autocomplete="cli_ap_materno" autofocus>

                                @error('cli_ap_materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('cli_fecha_nac') }}</label>

                            <div class="col-md-6">
                                <input id="cli_fecha_nac" type="date" class="form-control @error('cli_fecha_nac') is-invalid @enderror" name="cli_fecha_nac" value="{{ old('cli_fecha_nac') }}" required autocomplete="cli_fecha_nac" autofocus>

                                @error('cli_fecha_nac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_curp" class="col-md-4 col-form-label text-md-right">{{ __('cli_curp') }}</label>

                            <div class="col-md-6">
                                <input id="cli_curp" type="text" class="form-control @error('cli_curp') is-invalid @enderror" name="cli_curp" value="{{ old('cli_curp') }}" required autocomplete="cli_curp" autofocus>

                                @error('cli_curp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_rfc" class="col-md-4 col-form-label text-md-right">{{ __('cli_rfc') }}</label>

                            <div class="col-md-6">
                                <input id="cli_rfc" type="text" class="form-control @error('cli_rfc') is-invalid @enderror" name="cli_rfc" value="{{ old('cli_rfc') }}" required autocomplete="cli_rfc" autofocus>

                                @error('cli_rfc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
@endsection
