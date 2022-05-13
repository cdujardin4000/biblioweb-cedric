<?php
include '../includes/header.php';
include '../functions.php';
include '../dbaccess.php';

if (isset($_GET['error']) &&  $_GET['error'] == 'pass') {
    $errorAddUser = "Les Mots de passe ne correspondent pas. Veuillez recommencer.";
} else if (isset($_GET['error']) &&  $_GET['error'] == 'mail'){
    $errorAddUser = "Les adresses mail ne correspondent pas. Veuillez recommencer.";
} else if (isset($_GET['error']) &&  $_GET['error'] == 'db') {
    $errorAddUser = "Nous rencontronse des problemes actuellement. Si cela se prolonge, veuillez contacter l'administration";
}


if (!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['mail1']) && !empty($_POST['mail2'])){
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $mail1 = $_POST['mail1'];
    $mail2 = $_POST['mail2'];
    if ($password1 != $password2){
        header("location: signUp.php?action=signUp&path=admin&error=pass");
    } else if ($mail1 != $mail2){
        header("location: signUp.php?action=signUp&path=admin&error=mail");
    }
    addUser($username, $password2,  $mail2);
}

?>
<div class="container">

    <?php if (isset($_GET['error'])){ ?>
        <p class="errorLogin"><?=$errorAddUser?></p>
    <?php } ?>
    <form class="row g-3"  method="post" action="signUp.php?path=admin" >
        <div class="col-md-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" name = "username">
        </div>
        <div class="col-md-4">
            <label for="password1" class="form-label">Password</label>
            <input type="password" class="form-control" id="InputPassword1" name = "password1">
        </div>
        <div class="col-md-4">
            <label for="password2" class="form-label">Confirmez password</label>
            <input type="password" class="form-control" id="InputPassword2" name = "password2">
        </div>
        <div class="col-md-6">
            <label for="mail1" class="form-label">Mail</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="Entrez votre adresse mail" name = "mail1">
        </div>
        <div class="col-md-6">
            <label for="mail2" class="form-label">Confirmez mail</label>
            <input type="email" class="form-control" id="inputAddress2" placeholder="confirmez votre adresse mail" name = "mail2">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>


<?php
include '../includes/footer.php';
?>
