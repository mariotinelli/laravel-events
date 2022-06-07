<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/styles.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    </head>
    <body class="">

        <nav class="px-5 py-2 bg-dark position-sticky w-100" style="top: 0; z-index: 1">
            <div class="row justify-content-between align-items-center">
                <a href="#" class="logo">
                    <img src="/assets/logo.png" alt="logo">
                </a>
                <div class="search">
                    <input type="text" placeholder="Busque um evento">
                </div>
                <ul class="links">
                    <a href="#">Eventos</a>
                    <a href="#">Meus Eventos</a>
                    <a href="#">Criar Evento</a>
                    <a href="#">Logout</a>
                </ul>
            </div>
        </nav>

        <div class="w-100 h-100 p-5">
            @yield('content')
        </div>

    </body>
</html>



