<?php
include 'includes/header.php';
include 'functions.php';
include 'dbaccess.php';


/**
 * @param $ref
 * @return bool|void
 */
function deleteBook($refDel)
{
    // Create connection
    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "DELETE FROM books WHERE ref ='$refDel'";

    if ($mysqli->query($query)) {

        $mysqli->close();
        return true;

    } else {

        return $mysqli->error;
    }
}

//recuperer id deletebook
if (!empty($_POST['refDel']))
{
    $refDel = htmlspecialchars($_POST['refDel']);
    if(deleteBook($refDel))
    {
        header("location: index.php?succes=deleteBook");
    }
    else
    {
        header("location: index.php?error=db");
    }
}


if (isset($_GET['error']) &&  $_GET['error'] == 'membre') {
    $error = "Désolé, vous devez être membre pour aller sur cette page...";
} else if (isset($_GET['error']) &&  $_GET['error'] == 'admin') {
    $error = "Désolé, vous devez être admin pour aller sur cette page...";
} else if (isset($_GET['error']) &&  $_GET['error'] == 'db') {
    $error = "Problème avec la base de donnée, veuillez contacter votre administrateur réseau...";
}


if (isset($_GET['succes']) &&  $_GET['succes'] == 'deco') {
    $succes = "Vous êtes déconnecté, à bientôt";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'connect'){
    $succes = "Bonjour " . $_SESSION['username'] . ". Vous êtes bin connecté en tant que " . $_SESSION['status'] . ", Heureux de vous revoir parmis nous";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'userCreated'){
    $succes = "Bienvenue parmis nous " . $_SESSION['username'] . ". N'hésitez pas à contacter un admin en cas de problème.";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'editBook') {
    $succes = "Livre correctement mis à jour.";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'addBook') {
    $succes = "Livre correctement ajouté.";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'deleteBook') {
    $succes = "Livre correctement supprimé.";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'addAuthor') {
    $succes = "Auteur correctement ajouté.";
}
//récupere les livres
$query = "SELECT * FROM books";
$getBooks = dbAccess($query);
$books = $getBooks['data'];
$message = $getBooks['message'];

//recupére auteurs
$query = "SELECT * FROM authors" ;
$getAuthorsNames = dbAccess($query);
$authorsNames = $getAuthorsNames['data'];
$message = $getAuthorsNames['message'];
$authorsRealIds = getAuthorIds($authorsNames);

//recherche livre par auteur
if (isset($_GET['query']) && !empty($_GET['query'])){
    $authors = filterAuthors(strtolower($_GET['query']));
    $books = filterBooks($authors);
}

?>

<div class="container list">
    <?php if (isset($_GET['succes'])) { ?>
    <!-- On affiche les succes -->
    <p class="succes"><?= $succes ?></p>
    <?php } else if (isset($_GET['error'])) { ?>
    <!-- On affiche les erreurs -->
    <p class="error"><?= $error ?></p>
    <?php } ?>
    <!--On affiche la photo pour les nouveau membre-->
    <?php if($_SESSION['status'] == 'novice') { ?>
        <img src="img/dock-1846008_1920.jpg" alt= "IMAGE DE BIENVENUE" class="img-welcome"/>
    <?php } ?>
    <?php if(count($books) == 0) {
        $messageNoResult = "Pas de livre Trouvé";?>
        <p class="no-result"><?= $messageNoResult ?></p>
    <?php } else { ?>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>
                    <h2 class='list-text'>Référence</h2>
                </th>
                <th>
                    <h2 class='list-text'>Titre</h2>
                </th>
                <th>
                    <h2 class='list-text'>Auteur</h2>
                </th>
                <th>
                    <h2 class='list-text'>Couverture</h2>
                </th>
                <!--On affiche pas le bouton si on est ni admin ni membre-->
                <?php if($_SESSION['status'] !== 'membre' && $_SESSION['status'] !== 'admin') { ?>
                    <!--Sinon on l'affiche-->
                <?php }  else { ?>
                    <th>
                        <h2 class='list-text'>Actions</h2>
                    </th>
                <?php } ?>
            </tr>
            </thead>
            <tbody id="content">
            <?php foreach($books as $book) { ?>
                <tr>
                    <td>
                        <p class='list-text'><?= $book['ref'] ?></p>
                    </td>
                    <td>
                        <p class='list-text'><a href="view.php?id=<?= $book['ref'] ?>&authId=<?= $authorsRealIds[$book['author_id']]['id'] ?>"><?= $book['title'] ?></a></p>
                    </td>
                    <td>
                        <p class='list-text'><?= $authorsRealIds[$book['author_id']]['firstname']. " " . $authorsRealIds[$book['author_id']]['lastname'] ?></p>
                    </td>
                    <td>
                        <img src="<?= $book['cover_url'] ?>" alt="<?= $book['title'] ?>" class='book list-img'>
                    </td>
                    <td>
                    <?php if($_SESSION['status'] == 'admin') { ?>
                        <!-- Delete trigger modal
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                         Modal
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Vous allez supprimer ce livre. Veuillez confirmer.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Cette action est irréversible
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" name="refDel" value="<?= $book['ref'] ?>">
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                        <a class="btn btn-primary" href="edit.php?id=<?= $book['ref'] ?>&authId=<?= $authorsRealIds[$book['author_id']]['id'] ?>" >Edit</a>
                    <?php } else if($_SESSION['status'] == 'membre') { ?>
                        <a class="btn btn-primary" href="loan.php?id=<?= $book['ref'] ?>&authId=<?= $authorsRealIds[$book['author_id']]['id'] ?>" >Loan</a>
                    <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <!-- On affiche les messages -->
    <p class="no-result"><?= $message ?></p>
</div>
<?php
include 'includes/footer.php';
?>