<!doctype html>
<html lang="en">

<head>
    <title>Comptable - Fiches non traitées</title>
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

        @include('comptable.navbar')

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

                <a href="/comptable/fiches-non-traitees"><button type="button" class="btn btn-secondary active">
                        Fiches non traitées</button></a>
                <a href="/comptable/fiches-acceptees"><button type="button" class="btn btn-secondary">Fiches
                        acceptées</button></a>
                <a href="/comptable/fiches-refusees"><button type="button" class="btn btn-secondary">Fiches
                        refusées</button></a><br><br>

                Liste de toutes les fiches de frais non traitées.

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Visiteur</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Total</th>
                                <th>Etat</th>
                                <th>Editer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fiches as $fiche)
                                <tr>
                                    <td>{{ $fiche->user->nom }} {{ $fiche->user->prenom }}</td>
                                    <td>{{ $fiche->date }}</td>
                                    <td>{{ $fiche->description }}</td>
                                    <td>{{ $fiche->deplacement + $fiche->restauration + $fiche->hebergement + $fiche->autres }}
                                        €</td>
                                    <td>{{ $fiche->etat->libelle }}</td>
                                    <td><a href="" class="text-primary" data-toggle="modal"
                                            data-target="#view_{{ $fiche->id }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                            </svg></a>

                                        <form action="/comptable/fiches-non-traitees" method="post">
                                            {{ csrf_field() }}

                                            <input name="id" type="hidden" value={{ $fiche->id }}>
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

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">Fermer</button>
                                                            <div>
                                                                <select name="etat">
                                                                    <option selected value="non-traitee">Non traitée
                                                                    </option>
                                                                    <option value="acceptee">Acceptée</option>
                                                                    <option value="refusee">Refusée</option>
                                                                </select>
                                                                <button type="submit"
                                                                    class="btn btn-success">Valider</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <center>{{ $fiches->links() }}</center>
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
