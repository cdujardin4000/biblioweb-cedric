<?php
include 'includes/header.php';
include 'functions.php';
include 'dbaccess.php';


if (isset($_GET['error']) &&  $_GET['error'] == 'membre') {
    $error = "Désolé, vous devez être membre pour aller sur cette page...";
} else if (isset($_GET['error']) &&  $_GET['error'] == 'admin'){
    $error = "Désolé, vous devez être admin pour aller sur cette page...";
}


if (isset($_GET['succes']) &&  $_GET['succes'] == 'deco') {
    $succes = "Vous êtes déconnecté, à bientôt";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'connect'){
    $succes = "Bonjour " . $_SESSION['username'] . ". Vous êtes bin connecté en tant que " . $_SESSION['status'] . ", Heureux de vous revoir parmis nous";
} else if (isset($_GET['succes']) &&  $_GET['succes'] == 'userCreated'){
    $succes = "Bienvenue parmis nous " . $_SESSION['username'] . ". N'hésitez pas à contacter un admin en cas de problème.";
}

//récupere les livres
$query = "SELECT * FROM books";
$getBooks = dbAccess($query);
$books = $getBooks['data'];
$message = htmlspecialchars($getBooks['message']);

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
        <img src="img/dock-1846008_1920.jpg" class="img-welcome"/>
        <!--Sinon on affiche pas-->
    <?php }  else { ?>

    <?php } ?>
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
        <?php if(count($books) == 0) {
            $messageNoResult = "Pas de livre Trouvé";?>
            <p class="no-result"><?= $messageNoResult ?></p>
        <?php } else {
            foreach($books as $book) { ?>
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
                <!--On affiche pas le bouton si on est pas connecté || si on est ni admin ni membre-->
                <?php if($_SESSION['status'] !== 'membre' && $_SESSION['status'] !== 'admin') { ?>
                <!--Sinon on l'affiche-->
                <?php }  else { ?>
                <td>
                    <a class="btn btn-outline-dark btn-lg" href="edit.php?id=<?= $book['ref'] ?>&authId=<?= $authorsRealIds[$book['author_id']]['id']  ?>" >Modifier</a>
                </td>
                <?php } ?>
            </tr>
            <?php }
        }
        ?>
        </tbody>
    </table>
    <!-- On affiche les messages -->
    <p class="no-result"><?= $message ?></p>
</div>
<?php
include 'includes/footer.php';
?>