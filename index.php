<?php
include 'includes/header.php';
include 'functions.php';
include 'dbaccess.php';

if (isset($_GET['error']))
{
    $error = match ($_GET['error']) {
        'membre' => "Désolé, vous devez être membre pour aller sur cette page...",
        'admin' => "Désolé, vous devez être admin pour aller sur cette page...",
        'db' => "Problème avec la base de donnée, veuillez contacter votre administrateur réseau...",
    };
}

if (isset($_GET['succes']))
{
    $succes = match ($_GET['succes']) {
        'deco' => "Vous êtes déconnecté, à bientôt",
        'connect' => "Bonjour " . $_SESSION['username'] . ". Vous êtes bin connecté en tant que " . $_SESSION['status'] . ", Heureux de vous revoir parmis nous",
        'userCreated' => "Bienvenue parmis nous " . $_SESSION['username'] . ". N'hésitez pas à contacter un admin en cas de problème.",
        'editBook' => "Livre correctement mis à jour.",
        'addBook' => "Livre correctement ajouté.",
        'deleteBook' => "Livre correctement supprimé.",
        'addAuthor' => "Auteur correctement ajouté.",
        'loanBook' => "Livre loué. Bonne lecture",
    };
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

//récupere les livres indisponibles
$query = "SELECT * FROM loans";
$getLoans = dbAccess($query);
$loans = $getLoans['data'];
$message = $getLoans['message'];

/**
 * @param $refDel
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

    $query = "DELETE FROM books WHERE ref =$refDel";

    if ($mysqli->query($query)) {

        $mysqli->close();
        return true;

    } else {

        return $mysqli->error;
    }
}

/**
 * @param $id
 * @param $loandBook
 * @param $returnDate
 * @return string|void
 */
function loanBook($id, $loandBook, $returnDate)
{

    // Create connection
    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "INSERT INTO loans (user_id,book_id,return_date) VALUES ('$id','$loandBook','$returnDate')";

    if ($mysqli->query($query)) {

        $mysqli->close();
        header("location: index.php?succes=loanBook");

    } else {

        return $mysqli->error;
    }
}
if (isset($_POST['btn-loan'])){
    $loandBook = $_POST['book_id'];
    $id = $_SESSION['id'];
    $returnDate = date('Y-m-d', strtotime('+7days'));
    loanBook($id, $loandBook, $returnDate);
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
?>

<div class="container list">
    <?php if (isset($_GET['succes'])) { ?>
    <!-- On affiche les succes -->
    <div class="alert alert-success" role="alert">
        <p class="succes"><?= $succes ?></p>
    </div>
    <?php } else if (isset($_GET['error'])) { ?>
    <!-- On affiche les erreurs -->
    <div class="alert alert-danger" role="alert">
        <p class="error"><?= $error ?></p>
    </div>
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
                <!--On affiche pas les boutons si on est ni admin ni membre-->
                <?php if($_SESSION['status'] !== 'membre' && $_SESSION['status'] !== 'admin') { ?>
                    <!--Sinon on les affiche-->
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
                    <?php if ($_SESSION['status'] == "unknown") { ?>
                    <?php } else { ?>
                    <td>
                    <?php if($_SESSION['status'] == 'admin') { ?>
                        <!-- Delete trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                        <!-- Modal -->
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
                                        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                                            <input type="hidden" name="refDel" value="<?= $book['ref'] ?>">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="edit.php?id=<?= $book['ref'] ?>&authId=<?= $authorsRealIds[$book['author_id']]['id'] ?>" >Edit</a>
                    <?php } else if($_SESSION['status'] == 'membre') { ?>
                        <?php
                        $loaned = false;
                        $rateable = false;
                        $available = true;
                        foreach ($loans as $loan) {
                            if ($loan['book_id'] == $book['ref']) {
                                $available = false;
                                if ($loan['return_date'] > date('Y-m-d')) {
                                    $return = $loan['return_date'];
                                    $rateable = false;
                                    $loaned = true;
                                    $available = false;
                                }
                                if ($loan['return_date'] < date('Y-m-d')) {
                                    $rateable = true;
                                    $loaned = false;
                                    $available = true;
                                }
                            }
                        }
                        if($rateable) { ?>
                            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                                <input type="hidden" name="book_id" value="<?=$book['ref']?>">
                                <button name="btn-rate" type=submit class="btn btn-primary">Rate</button>
                            </form>
                        <?php } if ($available) { ?>
                            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                                <input type="hidden" name="book_id" value="<?=$book['ref']?>">
                                <button name="btn-loan" type=submit class="btn btn-primary">Loan</button>
                            </form>
                        <?php } if ($loaned) { ?>
                            <p class="list-text">retour prévu: <?= $return ?></p>
                        <?php }
                        }
                    } ?>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    <?php } ?>

    <!-- On affiche les messages -->
    <p class="no-result"><?= $message ?></p>
</div>
<?php
include 'includes/footer.php';
?>