<?php

namespace App\Http\Controllers;

use App\Models\Clasificaion;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class MovieController extends Controller
{
    // Inicio
    public function index()
    {
        return view('inicio');
    }
    // Muestra todo el contenido
    public function see()
    {
        $pelicula["peliculas"] = Pelicula::all();
        return view('seeMovies', [
            "peliculas" => $pelicula
        ]);
    }
    // Muestra la vista para agregar
    public function add()
    {
        $clasifiacion = Clasificaion::all();

        return view('addMovie', [
            "clasifiacion" => $clasifiacion
        ]);
    }

    // Actualiza
    public function update(Request $request, $id)
    {
        $pelicula = request()->except("_token", "_method");

        if ($request->hasFile("poster")) {
            $pelicula = Pelicula::findOrFail($id);
            Storage::delete("public/" . $pelicula->poster);
        }

        Pelicula::where("id", "=", $id)->update($pelicula);
        return redirect("movie");
    }

    // Muestra la vista de editar
    public function edit($id)
    {
        $clasifiacion = Clasificaion::all();

        $pelicula = Pelicula::findOrFail($id);

        return view('editMovie', compact("pelicula"), [
            "clasifiacion" => $clasifiacion

        ]);
    }
    // Elimina
    public function drop($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        if (Storage::delete("public/" . $pelicula->poster)) {
            Pelicula::destroy($id);
        }
        return redirect("movie");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Agrega
    public function store(Request $request)
    {
        // $pelicula = request()->all();
        $pelicula = request()->except("_token");
        if ($request->hasFile("poster")) {
            $pelicula["poster"] = $request->file("poster")->store("uploads", "public");
        }
        Pelicula::insert($pelicula);
        return redirect("movie");
    }

    // Api
    public function seeApi()
    {
        $pelicula["peliculas"] = Pelicula::all();
        return response()->json($pelicula);
    }

    public function seeApiId($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        return response()->json($pelicula);
    }

    public function dropApiId(Pelicula $pelicula, $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        if (Storage::delete("public/" . $pelicula->poster)) {
            Pelicula::destroy($id);
        }
        return redirect("/api");
    }

    public function addApi(Request $request)
    {
        $pelicula = request()->except("_token");
        if ($request->hasFile("poster")) {
            $pelicula["poster"] = $request->file("poster")->store("uploads", "public");
        }
        Pelicula::insert($pelicula);
        return redirect("/api");
    }
    public function editApi(Request $request, $id)
    {
        $pelicula = request()->except("_token", "_method");

        if ($request->hasFile("poster")) {
            $pelicula = Pelicula::findOrFail($id);
            Storage::delete("public/" . $pelicula->poster);
        }

        Pelicula::where("id", "=", $id)->update($pelicula);
        return redirect("/api");
    }
}
