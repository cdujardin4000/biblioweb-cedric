<?php
/**
 * @param $authors
 * @return array
 */
function getAuthorIds($authors)
{
    $tab = [];
    foreach($authors as $author)
    {
        $tab[$author['id']] = $author;
    }

    return $tab;
}

/**
 * @param $needle
 * @return array
 */
function filterAuthors($needle)
{
    //reset les auteurs
    $query = "SELECT * FROM authors" ;
    $getAuthors = dbAccess($query);
    $authors = $getAuthors['data'];
    $filtered = [];
    foreach ($authors as $author)
    {
        if (str_contains(strtolower($author['firstname']), strtolower($needle)) || str_contains(strtolower($author['lastname']), strtolower($needle)))
        {
            $filtered[] = $author;
        }
    }

    return $filtered;
}

/**
 * @param $authors
 * @return array
 */
function filterBooks($authors)
{
    //reset les livres
    $query = "SELECT * FROM books";
    $getBooks = dbAccess($query);
    $filtered = [];
    $books = $getBooks['data'];

    foreach ($authors as $author)
    {
        foreach ($books as $book)
        {
            if ($book['author_id'] == $author['id']) {
                $filtered[] = $book;
            }
        }
    }

    return $filtered;
}
function pwVerif($username, $password)
{
    // Connexion au serveur MySQL et sélection de la base de données
    if ($mysqli = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)) {

        // Nettoyage des données externes
        $username = mysqli_real_escape_string($mysqli, $username);

        // Exécution de la requête SQL
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login='$username'");
        if ($result) {
            // Extraction des données
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result); // Libérer la mémoire

            if ($user && password_verify($password, $user['password'])) {
                mysqli_close($mysqli); // Fermer la connexion au serveur
                return $user;
            }
        }
        mysqli_close($mysqli); // Fermer la connexion au serveur
        return false;
    }
}



function addUser($username, $password, $mail)
{
// Create connection
    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
// Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    // Nettoyage des données externes
    $username = mysqli_real_escape_string($mysqli, $username);
    $mail = mysqli_real_escape_string($mysqli, $mail);
    $password = password_hash($password, PASSWORD_BCRYPT);


    $query = "INSERT INTO users (login, password, email, statut) VALUES ('$username', '$password', '$mail', 'membre')";

    if ($mysqli->query($query) === TRUE) {

        $mysqli->close();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'novice';
        header("location: ../index.php?succes=userCreated");

    } else {

        header("location: signUp.php?path=admin&error=db");
    }
}

/*
function changeLogo(){
    $LogoMessage = "Veuillez choisir le nouveau logo";
    if(!empty($_FILES['logo'])){
        if($_FILES['logo']['error'] == 0){
            if($_FILES['logo']['size'] < 300000 && $_FILES['logo']['type'] == 'image/png'){

                //Renomme l'ancien fichier en old
                //rename('\img\quiz-logo.png', '\img\quiz-logo-old.png');
                //Renomme le nouveau fichier
                $_FILES['logo']['name'] = "quiz-logo.png";
                $source = $_FILES['logo']['tmp_name'];
                $destination = getcwd() . '\img\\' . $_FILES['logo']['name'];

                if(move_uploaded_file($source, $destination)){
                    $LogoMessage = "Le fichier est valide, nous l'affichons tout de suite,  merci";

                } else {
                    $LogoMessage = "Erreur : fichier invalide (max-size: 300ko, format: png)";
                }
                return $LogoMessage;
                header( "refresh:5;url=admin\admin.php" );
            }
        }
    }

}*/



