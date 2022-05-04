@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-8">
    <div class="card my-4">
        <div class="card-header">
            Edit  Post
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

            <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Titulo') }}</label>

                    <div class="col-md-6">
                        <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo',$post->titulo) }}" required autocomplete="name" autofocus>

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
                        <input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug',$post->slug) }}" required autocomplete="email">

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
                            <option value="{{$post->id_categoria}}">{{$post->categoria->nombre}}</option>
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
                        <input id="descripcion" type="text" class="form-control" name="descripcion"  value="{{ old('descripcion',$post->descripcion) }}" required autocomplete="descripcion">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="imagen" class="form-label">Imágen</label>
                    <input name="imagen" id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror"  placeholder="Imágen" aria-label="Imágen" aria-describedby="file">
                    @error('imagen')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
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
