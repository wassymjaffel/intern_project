<?php 
session_start();
if(!isset($_SESSION['name'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
    <style>
    .container {
        display: grid;
        width: 1fr;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 1em;
        padding-top: 20px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-light " aria-label="First navbar example">
        <div class="container-fluid">
            <div class="row" style="width: 100%;margin: auto;">
                <div class="col-md-12 col-lg-12">



                    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="
    background-color: #d6d6d6bf !important;
    border-radius: 8px;
">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/">Espace Admin</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/">Acceuil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_patient/">Gérer les patients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_fiche/">Gérer les fiches</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_appointment/">Gérer les rendez-vous</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./logout.php">Déconnexion</a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </nav>


    <p style="font-size: 51px;width: fit-content;margin: auto;margin-top: 124px;margin-bottom: 35px;">Bienvenue
        <?php echo $_SESSION['name']; ?></p>
    <div class="container">
        <div class="button"><a href="/manage_patient/">Gérer les patients</a></div>
        <div class="button"><a href="/manage_fiche/">Gérer les fiches</a></div>
        <div class="button"><a href="/manage_appointment/">Gérer les rendez-vous</a></div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>