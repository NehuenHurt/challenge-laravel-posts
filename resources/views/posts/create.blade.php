@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-8">
    <div class="card my-4">
        <div class="card-header">
            Crear Post
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

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Titulo') }}</label>

                    <div class="col-md-6">
                        <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="name" autofocus>

                        @error('titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Slug') }}</label>

                    <div class="col-md-6">
                        <input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="email">

                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoria') }}</label>

                    <div class="col-md-6">
                        <select id="id_categoria" name="id_categoria" class="form-control">
                            <option value="0">Seleccione la categoria</option>
                            @foreach($categorias as $rows)
                                <option value="{{ $rows->id }}">{{ $rows->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion') }}</label>
                    <div class="col-md-6">
                        <input id="descripcion" type="text" class="form-control" name="descripcion" required autocomplete="descripcion">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="imagen" class="form-label">Imágen</label>
                    <input name="imagen" id="imagen" type="file" class="form-control"  placeholder="Imágen" aria-label="Imágen" aria-describedby="file">
                    @error('imagen')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
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
