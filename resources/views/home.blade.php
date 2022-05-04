@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">  
            @if(count($posts))
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body row justify-content-center">
                            @if ($post->imagen)
                                <img src="{{ config('app.url').'/challenge-posts/storage/img/'. $post->id_usuario . "/" . $post->imagen}}" style="width: 250px;">
                            @endif
                            <h5 class="card-title row justify-content-center">Titulo : {{ $post->titulo }}</h5>
                            <p class="card-text row justify-content-center">
                                Descripcion : {{ $post->descripcion }}       
                            </p>
                            <p class="card-text row justify-content-center">
                                Cateoria : {{ $post->categoria->nombre }}       
                            </p>
                            <p class="text-dark-50 mb-0 row justify-content-center">
                                fecha alta : &ndash; {{  $post->created->format('d M Y') }}
                            </p>
                        </div>
                    </div>       
                @endforeach
            @else
                No hay posts cargados.
            @endif
            {{ $posts->links("pagination::bootstrap-4") }}

        </div>
    </div>
</div>
@endsection
