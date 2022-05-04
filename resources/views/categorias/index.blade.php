@extends('layouts.app')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <div class="container">
    <div class="card-header">
      <a class="btn btn-primary" href="{{ route('categorias.create') }}" target="_blank">Crear Categoria</a>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
          <h3>Listado Categorias</h3>
          <ul id="tree1">
            @if (count($categorias))
              @foreach($categorias as $category)
                <li>
                  <a href="{{ route('categorias.edit', $category)}}" target="_blank"> <i class="fa fa-edit"></i></a>
                  <form action="{{ route('categorias.destroy', $category) }}" method="POST" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button id="delete" name="delete" type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar categoria"onclick="return confirm('Desea eliminar...?')">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>     
                  {{ $category->nombre }}
                  @if(count($category->children))
                    @include('categorias/manageChild',['childs' => $category->children])
                  @endif
                </li>
              @endforeach     
             @else
               No hay categorias cargadas
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
<style>
  .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
</style>