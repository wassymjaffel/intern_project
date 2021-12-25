<?php 
$id_get = '';
if(isset($_GET['id'])) {
    $id_get = $_GET['id'];
}
include("../src/services/appointment_service.php");
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
                                        <a class="nav-link " href="/manage_patient/">Gérer les patients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/manage_fiche/">Gérer les fiches</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" href="/manage_appointment/">Gérer les rendez-vous</a>
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
                    $appointment_service = new appointment_service($db);
                    if($id_get != ''){
                        $appointment_by_id = $appointment_service->getById($id_get);
                    }
                    $patient_service = new patient_service($db);
                    $list_patient = $patient_service->getAll(); 
                  
            ?>


    <div class="container" style="margin-top: 94px;">
        <h1>Modifier rendez vous</h1>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="edit_appointment_action.php" method="post">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Modifier les Informations de rendez vous</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input name="id" type="hidden" value="<?php echo $id_get; ?>" />
                                        <label for="Patient">Patient</label>
                                        <select name="Patient" id="Patient" class="selectpicker" data-live-search="true"
                                            required>
                                            <option value="" disabled selected>Choisir patient</option>
                                            <?php for ($i=0; $i < count($list_patient); $i++) {  ?>
                                            <option value="<?php echo $list_patient[$i]->getId(); ?>">
                                                <?php echo $list_patient[$i]->getFirst_name().' '.$list_patient[$i]->getLast_name(); ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <script>
                                        document.querySelector("#Patient").value =
                                            <?php echo $appointment_by_id->getpatient()->getId(); ?>;
                                        </script>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <input value="<?php echo $appointment_by_id->getDate(); ?>" name="date"
                                            type="date" max="<?php echo date("Y-m-d"); ?>" class="form-control"
                                            id="Date" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Intervention">Intervention</label>
                                        <textarea maxlength="300" name="Intervention" style=" height: 100px; "
                                            class="form-control" id="Intervention" placeholder="Intervention"
                                            required><?php echo $appointment_by_id->getIntervention(); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="DOIT">DOIT</label>
                                        <input value="<?php echo $appointment_by_id->getDoit(); ?>" name="doit"
                                            type="number" class="form-control" id="DOIT" placeholder="DOIT" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="REÇU">REÇU</label>
                                        <input value="<?php echo $appointment_by_id->getRecu(); ?>" name="recu"
                                            type="number" class="form-control" id="REÇU" placeholder="REÇU" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right" style=" margin-top: 9px; ">
                                        <input type="submit" id="submit" value="Modfier"
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































    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#Patient').selectpicker();
    });
    </script>
</body>

</html>