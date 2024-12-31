<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleindex.css">
    <style>
        /* Estilo general */
        body {
            background: #002c57;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Formulario */
        .formnewuser {
            background: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            border: solid 1px #679dd3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: center;
            padding-bottom: 1em;
        }

        th svg {
            margin-bottom: 0.5em;
        }

        th h2 {
            font-size: 1.5em;
            color: #002c57;
            margin: 0;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-top: 0.5em;
            box-sizing: border-box;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            border: solid 1px rgb(210,210,210);
        }
        input[type="password"] {
            width: 100%;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-top: 0.5em;
            box-sizing: border-box;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            border: solid 1px rgb(210,210,210);
        }

        input[type="submit"] {
            width: 100%;
            background: #002c57;
            color: #fff;
            border: none;
            padding: 0.8em;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #2a5786;
        }

        a {
            font-size: 0.9em;
            color: #0073e6;
            text-decoration: none;
            font-size: 12px;
        }

        a:hover {
            text-decoration: underline;
        }

        tr td:first-child {
            text-align: right;
            padding-right: 1em;
        }

        tr td:last-child {
            text-align: left;
        }
    </style>
</head>
<body>
    <form action="{{url('/loginpage')}}" method="POST" class="formnewuser">
       @csrf

       <table>
        <thead>
            <th colspan="2">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16" color="#002c57">
                    <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z"/>
                    <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z"/>
                </svg>
                <h2>Login</h2>
            </th>
        </thead>
        <tr>
            <td><label>Email</label></td>
            <td><input type="text" name="email" id="email" required></td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="{{url('/registrar')}}">¿Aún no tienes una cuenta?</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Iniciar sesión">
            </td>
        </tr>
       </table>
    </form>
</body>
</html>
