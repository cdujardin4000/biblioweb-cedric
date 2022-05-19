<?php
include '../includes/header.php';

// verifier si l'user est connecté en tant que membre
// sinon on renvoie vers index
if($_SESSION['status'] !== 'admin')
{
    header("location: ..\index.php?error=admin"); // redirection
    exit;
}

$logoMessage = "Veuillez choisir le nouveau logo";
$path = "admin";
?>
<div class = "container">
    <p>Bonjour, </p>
    <p>Bienvenue dans la zone admin</p>
    <a class="btn btn-primary" href="../addAuthor.php" >Add author</a>
    <a class="btn btn-primary" href="../add.php" >Add book</a>
</div>
<div class="container form mb-3">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="admin.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
        <label class="form-label statusMessage"><?= $logoMessage ?></label>
        <input type="file" class="form-control form-control-dark" name="logo">
        <input type="submit" class="btn btn-warning change-logo" value="Valider">
    </form>
</div>
<?php
include '../includes/footer.php';
?>