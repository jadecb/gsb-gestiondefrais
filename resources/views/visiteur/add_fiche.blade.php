<!doctype html>
<html lang="en">

<head>
    <title>Visiteur - Saisir une fiche</title>
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
                                <h3>Ajouter une fiche de frais</h3>
                            </center>
                            <form action="/visiteur/saisir-une-fiche" method="post">
                                {{ csrf_field() }}

                                <br>
                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-calendar-day" viewBox="0 0 16 16">
                                        <path
                                            d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>&nbsp;&nbsp;<input type="date" name="date" required></p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                    </svg>&nbsp;&nbsp;<input type="text" name="description" placeholder="description"
                                        style="width:200px" required></p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443l-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057L9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z" />
                                    </svg>&nbsp;&nbsp;<input type="number" name="deplacement" step="0.01"
                                        placeholder="frais de déplacement" style="width:200px" required>
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-cup-straw" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M13.964 1.18a.5.5 0 0 1-.278.65l-2.255.902-.462 2.08c.375.096.714.216.971.368.228.135.56.396.56.82 0 .046-.004.09-.011.132l-.955 9.068a1.28 1.28 0 0 1-.524.93c-.488.34-1.494.87-3.01.87-1.516 0-2.522-.53-3.01-.87a1.28 1.28 0 0 1-.524-.93L3.51 6.132A.78.78 0 0 1 3.5 6c0-.424.332-.685.56-.82.262-.154.607-.276.99-.372C5.824 4.614 6.867 4.5 8 4.5c.712 0 1.389.045 1.985.127l.527-2.37a.5.5 0 0 1 .302-.355l2.5-1a.5.5 0 0 1 .65.279zM9.768 5.608A13.991 13.991 0 0 0 8 5.5c-1.076 0-2.033.11-2.707.278A3.284 3.284 0 0 0 4.645 6c.146.073.362.15.648.222C5.967 6.39 6.924 6.5 8 6.5c.571 0 1.109-.03 1.588-.085l.18-.808zm.292 1.756a5.513 5.513 0 0 0 1.325-.297l-.845 8.03c-.013.12-.06.185-.102.214-.357.249-1.167.69-2.438.69-1.27 0-2.08-.441-2.438-.69-.041-.029-.09-.094-.102-.214l-.845-8.03c.137.046.283.088.435.126.774.194 1.817.308 2.95.308.742 0 1.445-.049 2.06-.137zm-5.593-1.48s.003.002.005.006l-.005-.006zm7.066 0l-.005.006a.026.026 0 0 1 .005-.006zM11.354 6a3.282 3.282 0 0 1-.703.235l.1-.446c.264.069.464.142.603.211z" />
                                    </svg>&nbsp;&nbsp;<input type="number" name="restauration" step="0.01"
                                        placeholder="frais de restauration" style="width:200px" required>
                                </p><br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>&nbsp;&nbsp;<input type="number" name="hebergement" step="0.01"
                                        placeholder="frais d'hébergement" style="width:200px" required></p>
                                <br>

                                <p style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>&nbsp;&nbsp;<input type="number" name="autres" step="0.01"
                                        placeholder="autres frais" style="width:200px" required></p><br>

                                <p style="text-align: center;"><input type="submit" value="Ajouter la fiche"></p>
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
