@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-8">
    <div class="card my-4">
        <div class="card-header">
            Edit  Categoria
        </div>
        <div class="card-body py-5 px-5">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        - {{ $error }} <br />
                    @endforeach
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('categorias.update',$categoria) }}" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre',$categoria->nombre) }}" required autocomplete="name" autofocus>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-auto">
                    @csrf
                    @method('PUT')
                    <button id="update" name="update" type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>  
</div>
</div>
@endsection
