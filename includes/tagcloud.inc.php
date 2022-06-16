<?php
//include('config.php');

//récupere les tags
$query = "SELECT DISTINCT tags.tag, COUNT(*) as total FROM book_tag INNER JOIN tags ON tags.id=book_tag.tag_id GROUP BY tags.tag";
$getTags = dbAccess($query);
$tags = $getTags['data'];
$message = $getTags['message'];

$searchData = [];

if (isset($_GET['tag'])){
    $_SESSION['preferedTag'] = $_GET['tag'];
    try {
        $db = new PDO("mysql:host=".HOSTNAME.";dbname=".DATABASE, USERNAME, PASSWORD,  );
    } catch (Exception $e) {
        die("Error : " . $e->getMessage());
    }
    //récupere les title
    $requestFilterList = $db->prepare('SELECT title
                                            FROM books
                                            INNER JOIN book_tag bt on books.ref = bt.book_ref
                                            INNER  JOIN tags t on bt.tag_id = t.id
                                            WHERE tag = ?
                                            ORDER BY title');
    $requestFilterList->execute(array($_SESSION['preferedTag']));
    $titles = $requestFilterList->fetchAll();
}
?>

<div class="container-tags">
    <?php foreach($tags as$tag){
        if ($tag['total'] < 4){ ?>
        <small><a href="<?= $_SERVER['PHP_SELF'] ?>?tag=<?= $tag['tag'] ?>"><?= $tag['tag'] ?></a></small>
        <?php } else if ($tag['total'] >= 8) { ?>
        <big><a href="<?= $_SERVER['PHP_SELF'] ?>?tag=<?= $tag['tag'] ?>"><?= $tag['tag'] ?></a></big>
        <?php } else { ?>
        <span><a href="<?= $_SERVER['PHP_SELF'] ?>?tag=<?= $tag['tag'] ?>"><?= $tag['tag'] ?></a></span>
        <?php }
    }
    if (isset($_GET['tag'])){ ?>
        <h3>Résultat pour la recherche: <?=$_SESSION['preferedTag']?></h3>
        <ul>
            <?php foreach ($titles as $title){ ?>
                <li><?=$title['title']?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>