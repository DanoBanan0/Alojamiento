<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos Disponibles</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            margin-top: 0;
        }

        .card-content .price {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>

    <h1>Nuestros Alojamientos</h1>
    <p>Encuentra el lugar perfecto para tu próxima escapada.</p>

    <div class="container">
        @forelse ($alojamientos as $alojamiento)
        <div class="card">
            <img src="{{ $alojamiento->imagen_url }}" alt="{{ $alojamiento->nombre }}">
            <div class="card-content">
                <h3>{{ $alojamiento->nombre }}</h3>
                <p>{{ $alojamiento->descripcion }}</p>
                <p class="price">$ {{ $alojamiento->precio_por_noche }} por noche</p>
            </div>
        </div>
        @empty
        <p>No hay alojamientos disponibles en este momento.</p>
        @endforelse
    </div>

</body>

</html>