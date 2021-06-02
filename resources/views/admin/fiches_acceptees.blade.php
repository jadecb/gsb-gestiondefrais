<!doctype html>
<html lang="en">

<head>
    <title>Admin - Fiches acceptées</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/favicon.jpg" type="image/x-icon" />
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900') }}"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ URL::asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">

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

                <a href="/admin/les-fiches"><button type="button" class="btn btn-secondary">Toutes
                        les fiches</button></a>
                <a href="/admin/les-fiches/acceptees"><button type="button" class="btn btn-secondary active">Fiches
                        acceptées</button></a>
                <a href="/admin/les-fiches/refusees"><button type="button" class="btn btn-secondary">
                        Fiches refusées</button></a>
                <a href="/admin/les-fiches/non-traitees"><button type="button" class="btn btn-secondary">
                        Fiches non traitées</button></a><br><br>

                Liste de toutes les fiches de frais acceptées.

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Total</th>
                                <th>Etat</th>
                                <th>Consulter</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fiches as $fiche)
                                <tr>
                                    <td>{{ $fiche->id }}</td>
                                    <td>{{ $fiche->date }}</td>
                                    <td>{{ $fiche->description }}</td>
                                    <td>{{ $fiche->deplacement + $fiche->restauration + $fiche->hebergement + $fiche->autres }}
                                        €</td>
                                    <td>{{ $fiche->etat->libelle }}</td>
                                    <td><a href="" data-toggle="modal" data-target="#view_{{ $fiche->id }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                                <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                                                <path fill-rule="evenodd"
                                                    d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                            </svg></a>
                                        <a href="" data-toggle="modal" data-target="#delete_{{ $fiche->id }}"
                                            class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="22" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></a>

                                        <div class="modal fade" id="delete_{{ $fiche->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4><b>Etes vous sûr de supprimer la fiche N°{{ $fiche->id }}
                                                            ?</b></h4><br>
                                                        <p class="text-danger">Attention : Cette action est irréversible
                                                        </p>
                                                        <p><b>Par : </b>{{ $fiche->user->nom }}
                                                            {{ $fiche->user->prenom }}</p>
                                                        <p><b>Le : </b>{{ $fiche->date }}</p>
                                                        <p><b>Total :
                                                            </b>{{ $fiche->deplacement + $fiche->restauration + $fiche->hebergement + $fiche->autres }}
                                                            €</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Retour</button>
                                                        <a href={{ '/admin/les-fiches/delete/' . $fiche->id }}
                                                            class="text-white">
                                                            <button type="button" class="btn btn-danger">Supprimer
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="view_{{ $fiche->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Fiche N°{{ $fiche->id }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><b>Visiteur : </b> {{ $fiche->user->nom }}
                                                            {{ $fiche->user->prenom }}
                                                        </p>
                                                        <p><b>Date : </b> {{ $fiche->date }}</p>
                                                        <p><b>Description : </b><br>{{ $fiche->description }}</p>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>Deplacement : </th>
                                                                <td class="col-md-3">{{ $fiche->deplacement }} €
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Restauration : </th>
                                                                <td>{{ $fiche->restauration }} € </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Hébergement : </th>
                                                                <td>{{ $fiche->hebergement }} € </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Autres : </th>
                                                                <td>{{ $fiche->autres }} € </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total : </th>
                                                                <td>{{ $fiche->deplacement + $fiche->restauration + $fiche->hebergement + $fiche->autres }}
                                                                    €</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <center>{{ $fiches->links() }}<center>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
