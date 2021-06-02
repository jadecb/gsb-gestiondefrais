<!doctype html>
<html lang="en">

<head>
    <title>Admin - Ajouter un utilisateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/favicon.jpg" type="image/x-icon" />
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900') }}"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ URL::asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">

        @include('admin.navbar')

        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="mt-2 col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger">
                        {{ session()->get('failed') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <center>
                                <h3>Ajouter un utilisateur</h3>
                            </center>
                            <form action="/admin/inscription" method="post">
                                {{ csrf_field() }}

                                <br>
                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" fill="currentColor" class="bi bi-person-lines-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                    </svg>&nbsp;&nbsp;<input type="text" name="nom" placeholder="Nom" style="width:250px" required></p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>&nbsp;&nbsp;<input type="text" name="prenom" placeholder="Prenom" style="width:250px" required>
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                    </svg>&nbsp;&nbsp;<input type="text" name="email" placeholder="Email" style="width:170px" required> @gsb.com
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                    </svg>&nbsp;&nbsp;
                                    <select name="role">
                                        <option selected value="2">Visiteur</option>
                                        <option value="3">Comptable</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>&nbsp;&nbsp;<input type="password" name="password" placeholder="Mot de passe" style="width:250px"
                                        required>
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>&nbsp;&nbsp;<input type="password" name="password_confirmation" style="width:250px"
                                        placeholder="Confirmation" required>
                                </p><br>

                                <p style="text-align: center;"><input type="submit" value="Ajouter l'utilisateur"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
