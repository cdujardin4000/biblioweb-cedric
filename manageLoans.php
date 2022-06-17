<?php
include 'includes/header.php';
include 'dbaccess.php';

$loans = [];
$date= date('Y-m-d');
if(isset($_GET['login'])){
    $login = htmlspecialchars($_GET['login']);
    try {
        $db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE , USERNAME, PASSWORD);
    } catch (Exception $e) {
        die("Error : " . $e->getMessage());
    }
    $loginValid = $db->prepare('SELECT login FROM users WHERE login = ?');
    $loginValid->execute(array($login));

    $isLoginValid = $loginValid->fetch();
    if(isset($isLoginValid)){
        try {
            $db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE , USERNAME, PASSWORD);
        } catch (Exception $e) {
            die("Error : " . $e->getMessage());
        }
        $stmt = $db->prepare("SELECT  l.id , title, return_date FROM books 
                                    INNER JOIN loans l ON books.ref=l.book_id
                                    INNER JOIN users  u ON u.id=l.user_id 
                                    WHERE login=?");

        $stmt->execute(array($login));
        $loansFrom = $stmt->fetchAll(PDO::FETCH_ASSOC);


        var_dump($result);
    }

}


if (isset($_POST['btn-restitution'])){
    $loan = $_POST['id'];
    $returnDate = date('Y-m-d', strtotime('-1days'));
    $query = "UPDATE loans SET return_date=$returnDate WHERE id='$loan'";
    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $result = $mysqli->query($query);
}
?>
<div class="container">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <label class="form-label">Entrez le login du membre concerné</label>
        <input type="text" class="form-control form-control-dark" name="login">
        <button type="submit" class="btn btn-primary change-logo" name="btn-show-loans">Afficher les emprunts</button>
    </form>
</div>
<?php if (count($loans) != 0) { ?>
    <table>
    <?php foreach ($loans as $loan){
        if ($loan['return_date'] > $date ) {?>
        <tr>
            <td><?= $loan['title']?></td>
            <td><?= $loan['return_date']?></td>
            <td>
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <input type="hidden" name="id" value="<?=$loan['id']?>">
                    <button type="submit" class="btn btn-primary change-logo" name="btn-restitution">Restituer</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php }
} ?>


<?php
include 'includes/footer.php';
?>
