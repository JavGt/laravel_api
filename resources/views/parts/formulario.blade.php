<div class="campo">
    <label for="nombre">Nombre</label>
    <input value="{{ isset($pelicula->nombre) ? $pelicula->nombre : '' }}" type="text" id="nombre" placeholder="Agrega el nombre de la película" name="nombre">
</div>
<div class="campo">
    <label for="poster">Poster</label>
    <input type="file" id="poster" name="poster" value="{{ isset($pelicula->poster) ? $pelicula->poster : '' }}">
</div>
<div class="campo">
    <label for="duracion">Duracion</label>
    <input type="text" id="duracion" name="duracion" value="{{ isset($pelicula->duracion) ? $pelicula->duracion : '' }}">
</div>
<div class="campo">
    <label for="clasificacion">clasificacion</label>
    <select name="clasificacion" id="clasificacion" name="clasificacion" value="{{ isset($pelicula->clasificacion) ? $pelicula->clasificacion : '' }}">

        @foreach ($clasifiacion as $clasi)

        <option name="clasificacion" value="{{ $clasi->id }}">{{ $clasi->clasificacion }}</option>

        @endforeach

    </select>
</div>
<input class="formulario__submit" type="submit" value="Agregar Pelicula">