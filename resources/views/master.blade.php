<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container Package Management</title>

    @stack('css')

    <style>
        button {
            cursor: pointer;
        }

        .button {
            background-color: #f2f2f2; /* Default button color */
            border: 1px solid #999; /* Default border color and width */
            color: #333; /* Default text color */
            padding: 1px 6px; /* Default padding */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 0em;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Container Package Management</h1>

@yield('main-content')

@stack('js')
</body>
</html>
