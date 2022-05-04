@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
        <a class="btn btn-primary" href="{{ route('posts.create') }}" target="_blank">Crear Post</a>
        </div>
        <div class="row justify-content-center">
           @if (count($posts))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fecha Alta</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->id_usuario }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->categoria->nombre }}</td>
                            <td>{{ $item->created }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $item)}}" class="btn btn-warning d-inline-block" target="_blank" data-toggle="tooltip" data-placement="top" title="Editar Post">
                                    <i class="far fa-edit"></i> 
                                </a>
                                <form action="{{ route('posts.destroy', $item) }}" method="POST" class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button id="delete" name="delete" type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Post"onclick="return confirm('Desea eliminar...?')">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>     
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
               No hay posts cargados
           @endif         
        </div>
        {{ $posts->links(("pagination::bootstrap-4")) }}
    </div>
@endsection
