<?php 
include("../src/services/fiche_service.php");
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
    <!-- Latest compiled and minified CSS -->
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
                                        <a class="nav-link" href="/manage_patient/">Gérer les patients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/manage_fiche/">Gérer les fiches</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " href="/manage_appointment/">Gérer les rendez-vous</a>
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
                    require_once("../src/services/patient_service.php");
                    $patient_service = new patient_service($db);
                    $list_patient = $patient_service->getAll(); 
            ?>


    <div class="container" style="margin-top: 94px;max-width: 67%;">
        <h1>Ajouter fiche</h1>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="add_fiche_action.php" method="post">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Les Informations de Fiche</h6>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div id="canvas_container"> </div>
                                    <input type="hidden" name="teeth" id="teethvalue" />
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="form-group">

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

                                    </div>
                                    <div id="patientinfo"></div>
                                    <input type="hidden" name="id_patient" id="id_patientid" />
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Observations">Observations</label>
                                        <textarea maxlength="300" name="Observations" style=" height: 100px; "
                                            class="form-control" id="Observations" placeholder="Observations"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- #################################################################################### -->
                            <hr>

                            <div class="row gutters" style=" background-color: #e0e0e0; border-radius: 10px; ">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input name="date" type="date" max="<?php echo date("Y-m-d"); ?>"
                                            class="form-control" id="Date" required>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="form-group">
                                        <label for="Intervention">Intervention</label>
                                        <textarea maxlength="300" name="Intervention" style="height: 34px;"
                                            class="form-control" id="Intervention" placeholder="Intervention"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="DOIT">DOIT</label>
                                        <input name="doit" type="number" class="form-control" id="DOIT"
                                            placeholder="DOIT" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="REÇU">REÇU</label>
                                        <input name="recu" type="number" class="form-control" id="REÇU"
                                            placeholder="REÇU" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right" style=" margin-top: 9px; ">
                                        <input type="submit" id="submit" value="Ajouter"
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





























    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js" crossorigin="anonymous"> </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../assets/add-fiche-script.js"> </script>
</body>

</html>