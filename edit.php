<?php
include 'includes/header.php';
include 'dbaccess.php';
include 'functions.php';

if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM `books` WHERE `ref` = $id";
    $getBook = dbAccess($query);
    $book = $getBook['data'][0];

}
//recupére auteurs
$query = "SELECT * FROM authors" ;
$getAuthors = dbAccess($query);
$authors = $getAuthors['data'];
//recupére id
$authorsRealIds = getAuthorIds($authors);
//var_dump($authorsRealIds);die;


if (!empty($_POST['ref']) && !empty($_POST['title']) && !empty($_POST['author_id']) && !empty($_POST['description']) && !empty($_POST['cover_url']))
{
    // Nettoyage des données externes
    $title = htmlspecialchars( $_POST['title']);
    $author_id = htmlspecialchars($_POST['author_id']);
    $description = htmlspecialchars($_POST['description']);
    $cover_url = htmlspecialchars($_POST['cover_url']);
    $ref = $_POST['ref'];

    if(editBook($title, $author_id, $description, $cover_url, $ref))
    {
        header("location: index.php?succes=editBook");
    }
}

?>
<div class="container">
    <?php if (isset($_GET['error'])){ ?>
        <p class="errorLogin"></p>
    <?php } ?>
    <form class="row g-3"  method="post" action="edit.php">
        <input type="hidden" name="ref" value="<?= $_GET['id']?>">
        <?php foreach($book as $param => $value) { ?>
        <?php if ($param == 'ref'){ ?>
        <?php } else if ($param == 'author_id'){ ?>
            <div class="col-12">
                <label for="<?=$param?>" class="form-label">Author</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <?php foreach($authorsRealIds as $authorRealId => $val) { ?>
                    <?php  if ($val == $book['author_id']){ ?>
                    <option name ="<?=$param?>" value="<?=$authorRealId?>" selected><?=$authorsRealIds[$book['author_id']]['lastname'] . " " . $authorsRealIds[$book['author_id']]['firstname']?></option>
                    <?php } else { ?>
                            <option name ="<?=$param?>" value="<?=$authorRealId?>"><?=$authorsRealIds[$authorRealId]['lastname'] . " " . $authorsRealIds[$authorRealId]['firstname']?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <?php } else { ?>
            <div class="col-12">
                <label for="<?=$param?>" class="form-label"><?=$param?></label>
                <?php if ($param == 'description'){ ?>
                    <textarea type="text" class="form-control" name ="<?=$param?>" required><?=$value?></textarea>
                <?php } else { ?>
                    <input type="text" class="form-control" placeholder="<?=$value?>" name ="<?=$param?>" required>
                <?php } ?>
            </div>
            <?php } ?>
        <?php } ?>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
<?php
include 'includes/footer.php';
?>
