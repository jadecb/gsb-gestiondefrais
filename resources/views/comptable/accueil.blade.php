<!doctype html>
<html lang="en">

<head>
    <title>Comptable - Accueil</title>
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
            <br><br> <br>
            <p style="text-align: center;"><img src="/img/logo_gris.png" width="255" height="163"></p><br><br>
            <center>Bienvenue <b>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</b> sur votre site GSB.<br>
                Sur ce site vous pourrez traiter les différentes fiches de frais de nos visiteurs.<br>
                Si vous avez des prolèmes ou des questions, n'hésitez pas à prendre contact avec le service administratif via l'adresse mail suivante : support@gsb.com</center>
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
