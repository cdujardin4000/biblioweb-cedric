<?php
include 'includes/header.php';
include 'dbaccess.php';

//verifier session Admin
if($_SESSION['status'] !== 'admin'){
    header('Location: index.php?error=admin');
}
// gerer les success
if (isset($_GET['succes']) &&  $_GET['succes'] == 'bookattrib')
{
    $succes = "Location attribée";
}
// recuperer un utilisateur au hazard
try {
    $db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE , USERNAME, PASSWORD);
} catch (Exception $e) {
    die("Error : " . $e->getMessage());
}
$query = $db->prepare('SELECT login, id FROM users 
          ORDER BY RAND() 
          LIMIT 1');

$query->execute();

$user = $query->fetchAll(PDO::FETCH_ASSOC);

// Recup les livres
try {
    $db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE , USERNAME, PASSWORD);
} catch (Exception $e) {
    die("Error : " . $e->getMessage());
}
$query = "SELECT ref, title, firstname, lastname FROM books AS b INNER JOIN authors a ON b.author_id=a.id WHERE author_id NOT IN (SELECT DISTINCT a.id FROM authors INNER JOIN books ON a.id=b.author_id INNER JOIN loans l ON b.ref=l.book_id)";
$books = $db->query($query);
$booksToShow = $books->fetchAll(PDO::FETCH_ASSOC);

// Attribuer location
if(isset($_POST['bt-attrib'])){
    $book_ref = $_POST['ref'];
    $loaner = $_POST['user'];
    $returnDate = date('Y-m-d', strtotime('+7days'));
    try {
        $db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE , USERNAME, PASSWORD);
    } catch (Exception $e) {
        die("Error : " . $e->getMessage());
    }
    $stmt = $db->prepare("INSERT INTO loans (user_id,book_id,return_date) VALUES (?, ?, ?)");
    if ($stmt->execute(array($loaner, $book_ref, $returnDate))){

        header('Location: bookAttrib.php?succes=bookattrib');
    } else {
        $message = 'probleme lors de la location';
    }

}

?>
<div class="container">
    <?php if (isset($_GET['succes'])) { ?>
        <!-- On affiche les succes -->
        <div class="alert alert-success" role="alert">
            <p class="succes"><?= $succes ?></p>
        </div>
    <?php } ?>
    <h2>Membre sélectionné : <?= $user[0]['login'] ?></h2>

    <table>
        <?php foreach ($booksToShow as $book) { ?>
            <tr>
                <td><?=strtoupper($book['title'])?>, <?=$book['firstname']?> <?=$book['lastname']?></td>
                <td>
                    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="ref" value="<?=$book['ref']?>">
                        <input type="hidden" name="user" value="<?=$user[0]['id']?>">
                        <button name="bt-attrib" class="btn btn-primary">Attribuer location</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
include 'includes/footer.php';
?>