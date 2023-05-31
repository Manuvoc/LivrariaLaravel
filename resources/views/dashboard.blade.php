<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Livraria M&M </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



</head>


<body class="antialiased">
        <!-- Navigation-->
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">Livraria M&M</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Livraria</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{url ('index.php')}}">inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{url('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{url('register')}}">Registrar</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cadastros</a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" aria-current="page" href="{{url('usuario')}}">Usuario</a></li>
                                  <li><a class="dropdown-item" aria-current="page" href="{{url('livros')}}">Livros</a></li>
                                  <li><a class="dropdown-item" aria-current="page" href="{{url('estoque')}}">Estoque</a></li>
                                  <li><a class="dropdown-item" aria-current="page" href="{{url('emprestimo')}}">Emprestimos</a></li>
                                  <li><a class="dropdown-item" aria-current="page" href="{{url('leitura')}}">Leituras</a></li>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bem Vindo a nossa livraria!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="col" style="padding: 5%">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        @php
                            $nome_imagem = !empty($dashboard->imagem) ? $dashboard->imagem : 'diario.jpg';
                         @endphp
                         <br>
                         <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="200px" />
                         <br><br>
                        <h1 class="card-title">Diario de um banana</h1>
                        <br>
                        <p class="card-text">Greg é um garoto comum de 11 anos que vai à escola e enfrenta os desafios da pré-adolescência como milhões de outros.
                             O que o torna tão especial é a vontade de dividir essas experiências com todo mundo, para o caso de tornar-se rico e famoso quando crescer. E é por isso que ele escreve um diário - ou Livro de Memórias.</p>
<br>

                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @php
                        $nome_imagem = !empty($dashboard->imagem) ? $dashboard->imagem : 'acotar.jpg';
                     @endphp
                     <br>
                     <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="200px" />
                     <br><br>
                        <h5 class="card-title">Corte de Espinhos e Rosas</h5>
                        <br>
                        <p class="card-text">Corte de espinhos e rosas é um livro de fantasia de tirar o fôlego. Memorável em todos os aspectos, com personagens complexos, enredo rico e um magnífico mundo de fantasia combinados impecavelmente para criar um romance épico.</p>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">Copyright &copy; 2022 - By Manoela & Manueli</div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

