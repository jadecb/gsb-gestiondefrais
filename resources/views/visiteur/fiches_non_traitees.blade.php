<!doctype html>
<html lang="en">

<head>
    <title>Visiteur - Fiches non traitées</title>
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

        @include('visiteur.navbar')

        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="mt-4 col-md-12">

                <a href="/visiteur/consulter-mes-fiches"><button type="button" class="btn btn-secondary">Toutes
                        mes fiches</button></a>
                <a href="/visiteur/consulter-mes-fiches/acceptees"><button type="button"
                        class="btn btn-secondary">Fiches
                        acceptées</button></a>
                <a href="/visiteur/consulter-mes-fiches/refusees"><button type="button" class="btn btn-secondary">
                        Fiches refusées</button></a>
                <a href="/visiteur/consulter-mes-fiches/non-traitees"><button type="button"
                        class="btn btn-secondary active">
                        Fiches non traitées</button></a><br><br>

                Liste de toutes les fiches de frais non traitées.

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
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
            </div>
            <br>
            <center>{{ $fiches->links() }}</center>
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
