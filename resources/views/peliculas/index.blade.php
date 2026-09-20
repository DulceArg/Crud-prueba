<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4 text-center">🎬 Catálogo de Películas</h2>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span>Lista de Películas</span>
                        <a href="{{ route('peliculas.create') }}" class="btn btn-success btn-sm">Nueva Película</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <!-- Corrección para evitar duplicidad o elementos sin cerrar -->
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Género</th>
                                    <th>Año</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peliculas as $pelicula)
                                    <tr>
                                        <td>{{ $pelicula->id }}</td>
                                        <td>{{ $pelicula->titulo }}</td>
                                        <td>{{ $pelicula->genero }}</td>
                                        <td>{{ $pelicula->anio }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta película?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No hay películas registradas todavía.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>