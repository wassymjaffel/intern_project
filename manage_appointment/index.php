<?php 
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
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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



    <div class="row" style="width: 98%;margin: auto;">
        <div class="col-md-12 col-lg-12">
            <div class="row" style="width: 98%;margin: auto;">
                <h2
                    style="width: fit-content;margin-bottom: 7px;margin-top: 7px;background-color: #e0e0e0;padding: 5px 8px;border-radius: 9px;border: 1px solid #bababa;float: left;">
                    Gérer les rendez vous</h2>
                <a href="add_appointment.php" class="btn btn-success"
                    style="width: 111px;float: right;height: fit-content;font-size: 22px;margin-left: 11px;margin: auto 9px;">Ajouter</a>
            </div>
            <table id="appointmentTable" class="table" style=" margin-top: 37px; ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de patient</th>
                        <th scope="col">Date</th>
                        <th scope="col">Intervention</th>
                        <th scope="col">Doit</th>
                        <th scope="col">Reçu</th>
                        <th scope="col" style="width: 5%;"></th>
                        <th scope="col" style="width: 5%;"></th>
                        <th scope="col" style="width: 5%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $appointment_service = new appointment_service($db);
            $list_appointment = $appointment_service->getAll();
            for ($i=0; $i < count($list_appointment); $i++) { 
            ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php print($list_appointment[$i]->getpatient()->getFirst_name().' '.$list_appointment[$i]->getpatient()->getLast_name()); ?>
                        </td>
                        <td><?php echo $list_appointment[$i]->getDate(); ?></td>
                        <td><?php echo $list_appointment[$i]->getIntervention(); ?></td>
                        <td><?php echo $list_appointment[$i]->getDoit(); ?></td>
                        <td><?php echo $list_appointment[$i]->getRecu(); ?></td>
                        <td><a href="./appointment.php?id=<?php echo $list_appointment[$i]->getId(); ?>"
                                class="btn btn-info">Afficher</a></td>
                        <td><a href="edit_appointment.php?id=<?php echo $list_appointment[$i]->getId(); ?>"
                                class="btn btn-primary">Modifier</a></td>
                        <td><a href="delete_appointment_action.php?id=<?php echo $list_appointment[$i]->getId(); ?>"
                                class="btn btn-danger">Supprimer</a></td>

                    </tr>

                    <?php   
                      }
                    ?>
                </tbody>
            </table>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" crossorigin="anonymous"> </script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"> </script>




    <script>
    $(document).ready(function() {
        $('#appointmentTable').DataTable({
            ordering: true,

            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>

</html>