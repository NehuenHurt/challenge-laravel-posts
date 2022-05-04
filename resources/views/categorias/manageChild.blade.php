<ul>
    @foreach($childs as $child)
    <li id='sarasa'> 
        <a href="{{ route('categorias.edit', $child)}}" target="_blank"> <i class="fa fa-edit"></i></a>
        <form action="{{ route('categorias.destroy', $child) }}" method="POST" class="d-inline-block">
            @method('DELETE')
            @csrf
            <button id="delete" name="delete" type="submit" 
                    class="btn btn-danger" 
                    data-toggle="tooltip" data-placement="top" title="Eliminar categoria"
                    onclick="return confirm('Desea eliminar...?')">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>     
        {{ $child->nombre }}
        @if(count($child->children))
            @include('categorias/manageChild',['childs' => $child->children])
        @endif
    </li>
@endforeach

</ul>