@extends("layout.layout")

@section("title","Editar Pelicula")

@section("contenido")
<h1 class="heading">Agrega una pelicula</h1>

<div class="contenido container">
    <form action="{{ url('/movie/edit/'.$pelicula->id)}}" class="formulario" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf
        {{method_field("PUT")}}
        @include("parts.formulario")
    </form>
</div>
@endsection