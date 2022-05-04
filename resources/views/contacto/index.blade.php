@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="asunto" class="col-md-4 col-form-label text-md-end">{{ __('Asunto') }}</label>
                <div class="col-md-6">
                    <input id="asunto" type="asunto" class="form-control @error('asunto') is-invalid @enderror" name="asunto" value="{{ old('asunto') }}" required autocomplete="asunto">
                    @error('asunto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="mensaje" class="col-md-4 col-form-label text-md-end">{{ __('Mensaje') }}</label>
                <textarea class="form-control @error('mensaje') is-invalid @enderror" name="mensaje" id="mensaje" rows="4"></textarea>
        
                @error('mensaje')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-auto">
                @csrf
                @method('PUT')
                <button id="update" name="update" type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection
