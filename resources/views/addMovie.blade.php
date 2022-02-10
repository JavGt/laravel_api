@extends("layout.layout")

@section("title","Peliculas")

@section("contenido")
<h1 class="heading">Agrega una pelicula</h1>

<div class="contenido container">
    <form action="{{ url('/movie/add') }}" class="formulario" method="POST" enctype="multipart/form-data" id="formulario">
        @csrf
        @include("parts.formulario")
    </form>
</div>
@endsection

@section("js")
    <script src="/js/formulario.js"></script>
@endsection