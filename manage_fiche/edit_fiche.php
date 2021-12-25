<?php 
$id_get = '';
if(isset($_GET['id'])) {
    $id_get = $_GET['id'];
}
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        crossorigin="anonymous">
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
                                        <a class="nav-link active" href="/manage_fiche/">Gérer les fiches</a>
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
                    $fiche_service = new fiche_service($db);
                    $fiche_get = $fiche_service->getById($id_get); 
            ?>


    <div class="container" style="margin-top: 94px;max-width: 67%;">
        <h1>Modifier fiche</h1>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="edit_fiche_action.php" method="post">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Les Informations de Fiche</h6>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div id="canvas_container"> </div>
                                    <input type="hidden" name="teeth" id="teethvalue" />
                                    <input type="hidden" name="id_patient" id="id_patientid"
                                        value="<?php echo $fiche_get->getpatient()->getId();?>" />
                                    <input type="hidden" name="id_fiche" value="<?php echo $fiche_get->getId();?>" />
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="form-group">


                                        <div class="card h-100">
                                            <div class="card-body"
                                                style="border: 1px solid #b0b0b0;margin: 10px;border-radius: 10px;">
                                                <div class="account-settings">
                                                    <div class="user-profile"
                                                        style=" margin: inherit; padding: inherit; text-align: inherit; ">

                                                        <h5 class="user-name" style=" text-transform: uppercase; ">
                                                            <?php echo $fiche_get->getpatient()->getFirst_name().' '.$fiche_get->getpatient()->getLast_name(); ?>
                                                        </h5>
                                                    </div>
                                                    <div class="about"
                                                        style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                                        <h5>ÂGE :</h5>
                                                        <p><?php 
                                                    $date1 = new DateTime($fiche_get->getpatient()->getAnniversary());
                                                    $date2 = new DateTime(date("Y-m-d"));
                                                    $diff = $date1->diff($date2);
                                                    echo $fiche_get->getpatient()->getAnniversary().' / '.$diff->y.' ans'; ?>
                                                        </p>
                                                    </div>
                                                    <div class="about"
                                                        style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                                        <h5>Adresse :</h5>
                                                        <p><?php echo $fiche_get->getpatient()->getAddress(); ?></p>
                                                    </div>
                                                    <div class="about"
                                                        style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                                        <h5>Téléphone :</h5>
                                                        <p><?php echo $fiche_get->getpatient()->getTel(); ?></p>
                                                    </div>
                                                    <div class="about"
                                                        style=" margin: inherit; padding: inherit; text-align: inherit; ">
                                                        <h5>Profession :</h5>
                                                        <p>
                                                        <p><?php echo $fiche_get->getpatient()->getWork(); ?></p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"
                                            style=" border: 1px solid #b0b0b0; margin: 10px; border-radius: 10px; padding: 17px; ">
                                            <h5 style="margin: 0px;color: #007ae1;">Observations :</h5>
                                            <textarea maxlength="300"
                                                style="height: 149px;margin-top: 0px;margin-bottom: 0px;"
                                                name="Observations" style=" height: 100px; " class="form-control"
                                                id="Observations" placeholder="Observations"
                                                required><?php echo $fiche_get->getObservations(); ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                </div>
                            </div>

                            <!-- #################################################################################### -->
                            <hr>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <table id="appointmentTable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Intervention</th>
                                                <th scope="col">Doit</th>
                                                <th scope="col">Reçu</th>
                                                <th scope="col" style="background-color: inherit;width: 5%;"></th>
                                                <th scope="col" style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                        include("../src/services/appointment_service.php");
                        $appointment_service = new appointment_service($db);
            $list_appointment = $appointment_service->getByPatientId($fiche_get->getpatient()->getId());
         for ($i=0; $i < count($list_appointment); $i++){
         
            ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $list_appointment[$i]->getDate(); ?></td>
                                                <td><?php echo $list_appointment[$i]->getIntervention(); ?></td>
                                                <td><?php echo $list_appointment[$i]->getDoit(); ?></td>
                                                <td><?php echo $list_appointment[$i]->getRecu(); ?></td>
                                                <td><a href="../manage_appointment/edit_appointment.php?id=<?php echo $list_appointment[$i]->getId(); ?>"
                                                        class="btn btn-primary">Modifier</a></td>
                                                <td><a href="../manage_appointment/delete_appointment_action.php?id=<?php echo $list_appointment[$i]->getId(); ?>&ficheid=<?php echo $id_get; ?>"
                                                        class="btn btn-danger">Supprimer</a></td>
                                            </tr>

                                            <?php   
                      }
                    ?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <hr>
                            <h6>Ajouter rendez-vous :</h6>

                            <div class="row gutters" style=" background-color: #e0e0e0; border-radius: 10px; ">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input name="date" type="date" max="<?php echo date("Y-m-d"); ?>"
                                            class="form-control" id="Date">
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="form-group">
                                        <label for="Intervention">Intervention</label>
                                        <textarea maxlength="300" name="Intervention" style="height: 34px;"
                                            class="form-control" id="Intervention"
                                            placeholder="Intervention"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="DOIT">DOIT</label>
                                        <input name="doit" type="number" class="form-control" id="DOIT"
                                            placeholder="DOIT">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="REÇU">REÇU</label>
                                        <input name="recu" type="number" class="form-control" id="REÇU"
                                            placeholder="REÇU">
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right"
                                            style="margin-top: 9px;margin-bottom: 9px;margin-left: 9px;">
                                            <input disabled type="button" id="addappointment"
                                                value="Ajouter Rendez-Vous" class="btn btn-primary"></input>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right" style=" margin-top: 9px; ">
                                        <input style=" float: right; " type="submit" id="submit" value="Enregistrer"
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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" crossorigin="anonymous"> </script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"> </script>
    <script>
    var teeth_arraystring = '<?php echo $fiche_get->getTeeth(); ?>';
    </script>
    <script src="../assets/edit-fiche-script.js"> </script>
</body>

</html>