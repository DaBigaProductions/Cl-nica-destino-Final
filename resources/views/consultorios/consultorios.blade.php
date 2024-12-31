<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultorios</title>
    <style>
        body {
        background: rgb(230,230,230);
        padding: 0; 
        margin: 0;
        }

        .main-content {
            margin-top: 6em; 
            margin-left:20em;
            margin-right:1em;
            margin-bottom:1em;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: fit-content;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            text-align: center;
            padding: 10px;
            border: solid 1px #002c57;
            margin: 20px;
        }

        .card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h2 {
            margin: 10px 0 5px;
            color: #002c57;
        }

        .card-content p {
            margin: 5px 0;
            font-size: 1.5em;
            color: #002c57;
        }

        .card-content a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .card-content a:hover {
            text-decoration: underline;
        }

        .section-content{
            padding: 20px;
            display: flex;
            flex-wrap: wrap; /*asegura que las tarjetas que no caben en una fila pasen a la siguiente. */
            justify-content: center;
        }

        #eliminar-submit {
            background: #002c57;
            color: white;
            border-radius: 10px;
            border: solid 1px #002c57;
            padding: 10px;
            margin: 10px;
        }
        #eliminar-submit:hover {
            background: #2a5786;
        }
        #ver-submit {
            background: #002c57;
            color: white;
            border-radius: 10px;
            border: solid 1px #002c57;
            padding: 10px;
        }
        #ver-submit:hover {
            background: #2a5786;
        }
        .section-content h1{
            text-align:center;
            width: 100%;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        @include('layout')
    </header>

    <section class="main-content">
        <div class="section-content">
            <h1>Consultorios</h1>
            <div class="card">
                <img src="..\images\door.png" alt="Profile Image">
                <div class="card-content">
                    <h2>Agregar nuevo</h2>

                    <form action="{{ route('consultorios.create') }}" method="GET">
                        @csrf 
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" color="#002c57">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                        </button>
                    </form>

                </div>
            </div>
            @foreach($listaCon as $key)
            <div class="card">
                <img src="..\images\door.png" alt="Profile Image">
                <div class="card-content">
                    <h2>Consultorio #{{ $key -> numero }}</h2>
                    <p>Piso: {{ $key -> piso }}</p>
                    <form action="{{ route('consultorios.edit', $key->id) }}" method="GET">
                        @csrf 
                        @method('EDIT')
                        <button type="submit" id="ver-submit">Ver</button>
                    </form>
                    <form action="{{ route('consultorios.destroy', $key->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" id="eliminar-submit">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </section>

</body>
</html>

