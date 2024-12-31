<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Cita</title>
    <style>
        /* Fondo simulando papel */
        body {
            background: #f9f9f9;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Contenedor simulando papel */
        .formnewuser {
            background: #fff;
            padding: 2em;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: center;
            padding-bottom: 1em;
            font-size: 1.5em;
            color: #333;
        }

        th svg {
            margin-bottom: 0.5em;
        }

        th h2 {
            font-size: 1.8em;
            color: #333;
            margin: 0;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.5em;
            margin-top: 0.5em;
            border: none;
            border-bottom: 1px solid #ccc;
            font-family: inherit;
            font-size: 14px;
            background: transparent;
            color: #333;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 0.8em;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
            text-align: center;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        tr td:first-child {
            text-align: right;
            padding-right: 1em;
            color: #444;
        }

        tr td:last-child {
            text-align: left;
        }

        tr:last-child td {
            text-align: center;
        }

        .header {
            border-bottom: 2px solid #ccc;
            margin-bottom: 1em;
            padding-bottom: 1em;
        }

        .footer {
            border-top: 2px solid #ccc;
            margin-top: 2em;
            padding-top: 1em;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="formnewuser">
        <div class="header">
            <h2>Información de la Cita</h2>
        </div>
        <form action="{{ route('citas.update', $cita->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td><label>Paciente:</label></td>
                    <td><input type="text" name="paciente_id" value="{{ $cita->paciente->nombre }}" readonly></td>
                </tr>
                <tr>
                    <td><label>Doctor:</label></td>
                    <td><input type="text" name="doctor_id" value="{{ $cita->doctor->nombre }}" readonly></td>
                </tr>
                <tr>
                    <td><label>Diagnóstico:</label></td>
                    <td><input type="text" name="diagnostico" value="{{ $cita->diagnostico }}"></td>
                </tr>
                <tr>
                    <td><label>Tratamiento:</label></td>
                    <td><input type="text" name="tratamiento" value="{{ $cita->tratamiento }}"></td>
                </tr>
                <tr>
                    <td><label>Fecha:</label></td>
                    <td><input type="text" name="fecha" value="{{ $cita->fecha }}"></td>
                </tr>
                <tr>
                    <td>
                        <form action="{{route('citas.index')}}" method="get">
                            @csrf 
                            <input type="submit" value="Regresar">
                        </form>
                    </td>
                    <td>
                        <input type="submit" value="Actualizar">
                    </td>
                </tr>
            </table>
        </form>
        <div class="footer">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16" color="#777">
                    <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z"/>
                    <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z"/>
                </svg>
            <p>Con amor, clínica destino final</p>
        </div>
    </div>
</body>
</html>
