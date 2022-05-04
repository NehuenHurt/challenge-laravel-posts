@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">
      <a class="btn btn-primary" href="{{ route('usuarios.create') }}" target="_blank">Crear usuario</a>
    </div>
    <div class="row justify-content-center">
      @if (count($usuarios))
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Fecha Alta</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created }}</td>
                <td>
                  <a href="{{ route('usuarios.edit', $item)}}" class="btn btn-warning d-inline-block" target="_blank" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                    <i class="far fa-edit"></i> 
                  </a>
                  <form action="{{ route('usuarios.destroy', $item) }}" method="POST" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button id="delete" name="delete" type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"onclick="return confirm('Desea eliminar...?')">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>     
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
       No hay usuarios cargados 
     @endif
    </div>
    {{ $usuarios->links(("pagination::bootstrap-4")) }}
</div>
@endsection
