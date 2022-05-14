<?php
include('config.php');
function dbRequest($query)
{
    $data = [];
    $message = "";

    // se connecter au serveur Mysql
    $mysqli = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD); //@pour ne rien afficher si erreur

    // selectionner une base de donnée
    if ($mysqli) {

        if (mysqli_select_db($mysqli, DATABASE)) {
            //préparer une requète
            $result = mysqli_query($mysqli, $query);


            if($result){
                //extraire les résultats
                while (($line = mysqli_fetch_assoc($result)) != null) {
                    $data[] = $line;
                }
                //libérer la mémoire
                mysqli_free_result($result);

            }
        } else {

            $message = "Base de donnée inconnue";

        }
    } else {

        $message = "Erreur de connexion";

    }
    $response = [
        'data' => $data,
        'message' => $message,
    ];
    //fermer la connection
    mysqli_close($mysqli);

    return $response;

}


