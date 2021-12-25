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
                                        <a class="nav-link active" href="/manage_patient/">Gérer les patients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_fiche/">Gérer les fiches</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_appointment/">Gérer les rendez-vous</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/logout.php">Déconnexion</a>
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
        <h1>Affichage patient</h1>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body" style="border: 1px solid #b0b0b0;margin: 10px;border-radius: 10px;">
                        <div class="account-settings">
                            <div class="user-profile" style=" margin: inherit; padding: inherit; text-align: inherit; ">

                                <h5 class="user-name" style=" text-transform: uppercase; ">
                                    <?php echo $patient_by_id->getFirst_name().' '.$patient_by_id->getLast_name(); ?>
                                </h5>
                            </div>
                            <div class="about" style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                <h5>ÂGE :</h5>
                                <p><?php 
                                                    $date1 = new DateTime($patient_by_id->getAnniversary());
                                                    $date2 = new DateTime(date("Y-m-d"));
                                                    $diff = $date1->diff($date2);
                                                    echo $patient_by_id->getAnniversary().' / '.$diff->y.' ans'; ?>
                                </p>
                            </div>
                            <div class="about" style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                <h5>Adresse :</h5>
                                <p><?php echo $patient_by_id->getAddress(); ?></p>
                            </div>
                            <div class="about" style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                <h5>Téléphone :</h5>
                                <p><?php echo $patient_by_id->getTel(); ?></p>
                            </div>
                            <div class="about" style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                <h5>Profession :</h5>
                                <p>
                                <p><?php echo $patient_by_id->getWork(); ?></p>
                                </p>
                            </div>
                        </div>
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