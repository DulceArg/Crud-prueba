<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Mostrar la lista de películas
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    // Mostrar el formulario para crear una nueva película
    public function create()
    {
        return view('peliculas.create');
    }

    // Guardar la nueva película en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'genero' => 'required|max:100',
            'anio' => 'required|integer|min:1900|max:2030',
        ]);

        Pelicula::create($request->all());

        return redirect()->route('peliculas.index')->with('success', '¡Película agregada con éxito!');
    }

    // Mostrar el formulario para editar una película existente
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    // Actualizar la película en la base de datos
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'genero' => 'required|max:100',
            'anio' => 'required|integer|min:1900|max:2030',
        ]);

        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')->with('success', '¡Película actualizada con éxito!');
    }

    // Eliminar la película
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();

        return redirect()->route('peliculas.index')->with('success', '¡Película eliminada con éxito!');
    }
}