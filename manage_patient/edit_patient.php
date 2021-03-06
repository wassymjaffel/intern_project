<?php 
$id_get = '';
if(isset($_GET['id'])) {
    $id_get = $_GET['id'];
}
include("../src/services/patient_service.php");
include('../db/config.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location:http://".$_SERVER['HTTP_HOST']);
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
    <link href="../assets/style.css" rel="stylesheet">
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
                                        <a class="nav-link" aria-current="page" href="/">Acceuil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/manage_patient/">G??rer les patients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_fiche/">G??rer les fiches</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_appointment/">G??rer les rendez-vous</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/logout.php">D??connexion</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </nav>






    <?php 
                    $patient_service = new patient_service($db);
                    if($id_get != ''){
                        $patient_by_id = $patient_service->getById($id_get);
                    }
                  
            ?>


    <div class="container" style="margin-top: 94px;">
        <h1>Modifier patient</h1>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="edit_patient_action.php" method="post">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Modifier les Informations</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input name="id" type="hidden" value="<?php echo $id_get; ?>" />
                                        <label for="Nom">Nom</label>
                                        <input name="nom" value="<?php echo $patient_by_id->getFirst_name(); ?>"
                                            type="text" class="form-control" id="Nom" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Prenom">Pr??nom</label>
                                        <input name="prenom" value="<?php echo $patient_by_id->getLast_name(); ?>"
                                            type="text" class="form-control" id="Prenom" placeholder="Pr??nom" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Date">Date de naissance</label>
                                        <input name="date" type="date"
                                            value="<?php echo $patient_by_id->getAnniversary(); ?>"
                                            max="<?php echo date("Y-m-d"); ?>" class="form-control" id="Date" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Adresse">Adresse</label>
                                        <input name="adresse" value="<?php echo $patient_by_id->getAddress(); ?>"
                                            type="text" class="form-control" id="Adresse" placeholder="Adresse"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="tel">T??l??phone</label>
                                        <input name="tel" value="<?php echo $patient_by_id->getTel(); ?>" type="text"
                                            class="form-control" id="tel" placeholder="T??l??phone" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Profession">Profession</label>
                                        <input name="profession" value="<?php echo $patient_by_id->getWork(); ?>"
                                            type="text" class="form-control" id="Profession" placeholder="Profession"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right" style=" margin-top: 9px; ">
                                        <input type="submit" id="submit" value="Modifier"
                                            class="btn btn-primary"></input>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>