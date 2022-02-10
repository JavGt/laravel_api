@extends("layout.layout")


@section("title","Peliculas")

@section("contenido")
<h1 class="heading">Lista de peliculas</h1>


<table class="container tabla">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Poster</th>
            <th>Duración</th>
            <th>Clasificación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($peliculas as $pelicula)
        @foreach ($pelicula as $peli)
        <tr>
            <td>{{ $peli->id }}</td>
            <td>{{ $peli->nombre }}</td>
            <td><img src="{{ asset('storage').'/'.$peli->poster }}" alt=""></td>
            <td>{{ $peli->duracion }}</td>
            <td>{{ $peli->clasificacion }}</td>
            <td>
                <div class="acciones"><a href="{{ url('/movie/edit/'.$peli->id)}}">Editar</a> 

                    <form action="{{ url('/movie/'.$peli->id)}}" method="POST">
                        @csrf
                        {{method_field("DELETE")}}
                        <input type="submit" onclick="return confirm('¿Deseas realmente borrar?')" value="Borrar">
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>

@endsection