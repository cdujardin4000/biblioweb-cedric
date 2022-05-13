<?php
include '../includes/header.php';
include '../functions.php';
include '../config.php';

$message="";
$connected = false;
if(isset($_GET['action']) && $_GET['action'] == 'logout')
{
    session_unset(); // suppression des variables de sessions
    session_destroy(); // destruction de la session
    header("location: ../index.php?succes=deco");

}
if(isset($_GET['action']) && $_GET['action'] == 'check')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user = pwVerif($username, $password)){
        $connected = true;

        $_SESSION['username'] = $user['login'];
        $_SESSION['status'] = $user['statut'];
        header("location: ../index.php?succes=connect");
    } else {
        header("location: log.php?error=true&path=admin&action=login");
    }

}

if(isset($_GET['error']) && $_GET['error'] == 'true'){
    $errorLogin = "Il y à une erreur dans votre username ou dans votre password";
}
?>
    <div class="container">
    <?php if (isset($_GET['error']) && $_GET['error'] == 'true') { ?>
       <p class="errorLogin"><?=$errorLogin?></p>
    <?php } ?>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'login') { ?>
        <form method="post" action="log.php?action=check" class="row g-3">
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="col-md-12">
                <input class="btn btn-primary" type="submit">
                <a class="btn btn-primary" href="log.php?action=lostPw">J'ai oublié mon mot de passe</a>
            </div>
        </form>

    <?php } else { ?>
        <a href="">J'ai oublié mon identifiant</a>
        <a class="btn btn-outline-dark btn-lg" href="pwRecup.php">J'ai oublié mon mot de passe</a>
    <?php } ?>
</div>
<?php
include '../includes/footer.php';
?>