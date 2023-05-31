<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livraria M&M </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


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
                </div>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif



        <div class="container">
            <h1>Listagem de Emprestimos {{ request()->id }}</h1>
            <br>
            <form action="{{ action('App\Http\Controllers\EmprestimosController@search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <select name="campo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="dataretirada">Data Retirada</option>
                            <option value="datadevolucao">Data Devolução</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                        <a class="btn btn-success"
                            href='{{ action('App\Http\Controllers\EmprestimosController@create') }}'><i
                                class="fa-solid fa-plus"></i>Cadastrar</a>
                    </div>
                </div>
            </form>
            <br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data Retirada</th>
                        <th scope="col">Data Devolução</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emprestimos as $item)
                        @php
                            $nome_imagem = !empty($item->livro->imagem) ? $item->livro->imagem : 'sem_imagem.jpg';
                        @endphp
                        <tr>
                            <td scope='row'>{{ $item->id }}</td>
                            <td>{{ !empty($item->livro->nome) ? $item->livro->nome : '' }}</td>
                            <td>{{ $item->dataretirada }}</td>
                            <td>{{ $item->datadevolucao }}</td>

                            <td><img src="/storage/{{ $nome_imagem }}" width="100px" class="img-thumbnail" />
                            </td>
                            <td><a href="{{ action('App\Http\Controllers\EmprestimosController@edit', $item->id) }}"><i
                                        class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
                            <td>
                                <form method="POST"
                                    action="{{ action('App\Http\Controllers\EmprestimosController@destroy', $item->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick='return confirm("Deseja Excluir?")'
                                        style='all: unset;'><i class='fa-solid fa-trash' style='color:red;'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Footer-->
        <br>
        <br>
        <br>
        <br>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
</body>

</html>
