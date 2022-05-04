@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-8">
    <div class="card my-4">
        <div class="card-header">
            Crear Categoria
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

            <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus>

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label>Category:</label>
                    <select id="id_padre" name="id_padre" class="form-control">
                        <option value="0">Es una categoria Padre</option>
                        @foreach($allCategorias as $rows)
                                <option value="{{ $rows->id }}">{{ $rows->nombre }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('id_padre'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('id_padre') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row mb-0">
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
@endsection
