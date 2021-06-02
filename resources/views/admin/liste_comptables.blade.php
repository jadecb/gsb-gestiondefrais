<!doctype html>
<html lang="en">

<head>
    <title>Admin - Liste des comptables</title>
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

            <div class="mt-4 col-md-12">

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

                <a href="/admin/liste-utilisateurs"><button type="button" class="btn btn-secondary">Tous
                        les utilisateurs</button></a>
                <a href="/admin/liste-visiteurs"><button type="button" class="btn btn-secondary">Tous les
                        visiteurs</button></a>
                <a href="/admin/liste-comptables"><button type="button" class="btn btn-secondary active">
                        Tous les comptables</button></a>
                <a href="/admin/liste-admins"><button type="button" class="btn btn-secondary">
                        Tous les admins</button></a><br><br>

                Liste de tous les utilisateurs de GSB.
                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Gérer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->nom }}</td>
                                    <td>{{ $user->prenom }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->permiss->role->libelle }}</td>
                                    <td><a href="" data-toggle="modal" data-target="#edit_{{ $user->id }}"
                                            class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                            </svg>
                                        </a>

                                        <div class="modal fade" id="edit_{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <form action={{ '/admin/utilisateur/edit/' . $user->id }}
                                                            method="get">
                                                            <h4><b>Modification de l'utilisateur :</b></h4><br>
                                                            <p>Nom : <input type="text" name="nom"
                                                                    placeholder={{ $user->nom }}
                                                                    value={{ $user->nom }}></p>
                                                            <p>Prénom : <input type="text" name="prenom"
                                                                    placeholder={{ $user->prenom }}
                                                                    value={{ $user->prenom }}></p>
                                                            <p>Email : <input type="text" name="email"
                                                                    placeholder={{ $user->email }}
                                                                    value={{ $user->email }}></p>
                                                            <p>Role* : <select name="role">
                                                                    <option selected
                                                                        value={{ $user->permiss->role->id }}>----
                                                                    </option>
                                                                    <option value="2">Visiteur</option>
                                                                    <option value="3">Comptable</option>
                                                                    <option value="1">Admin</option>
                                                                </select></p>
                                                            <input type="hidden" name="password">
                                                            <p>Mot de passe : <input type="text" name="password"
                                                                    placeholder="Nouveau mot de passe"></p>
                                                            <p>Verification : <input type="text"
                                                                    name="password_confirmation"
                                                                    placeholder="Verfication mot de passe"></p><br>
                                                                    <p>*Ne pas modifier si le role ne change pas</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Retour</button>
                                                        <input type="submit" class="btn btn-success" value="Valider">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        &nbsp;<a href="" data-toggle="modal" data-target="#delete_{{ $user->id }}"
                                            class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="22" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>

                                        <div class="modal fade" id="delete_{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4><b>Etes vous sûr de supprimer cet utilisateur ?</b></h4><br>
                                                        <p><b>Nom : </b>{{ $user->nom }} {{ $user->prenom }}</p>
                                                        <p><b>Role : </b>{{ $user->permiss->role->libelle }}</p>
                                                        <p></p>
                                                        <p class="text-danger">Attention : Cette action est irréversible
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Retour</button>
                                                        <a href={{ '/admin/utilisateur/delete/' . $user->id }}
                                                            class="text-white">
                                                            <button type="button" class="btn btn-danger">Supprimer
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <center>{{ $users->links() }}</center>
                </div>
            </div>
        </div>

        <script src="/js/jquery.min.js"></script>
        <script src="/js/popper.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
</body>

</html>
