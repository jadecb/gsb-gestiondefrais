<!doctype html>
<html lang="en">

<head>
    <title>Comptable - Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/favicon.jpg" type="image/x-icon"/>
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
            <div class="mt-2 col-md-12">
            
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <center>
                                <h3>Vos informations personnelles</h3>

                                <br>
                                <b>Nom : </b>{{ auth()->user()->nom }} <br><br>
                                <b>Prénom : </b>{{ auth()->user()->prenom }} <br><br>
                                <b>Email : </b>{{ auth()->user()->email }} <br><br>
                                <b>Role : </b>{{ auth()->user()->permiss->role->libelle }}
                            </center>
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
