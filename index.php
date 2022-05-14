<?php
include 'includes/header.php';
//var_dump($books); die;
?>
    <div class="container list">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>
                    <h2 class='list-text'>Référence</h2>
                </td>
                <td>
                    <h2 class='list-text'>Titre</h2>
                </td>
                <td>
                    <h2 class='list-text'>Auteur</h2>
                </td>
                <td>
                    <h2 class='list-text'>Couverture</h2>
                </td>
            </tr>
            </thead>
            <tbody id="content">
            <?php if(count($books) == 0) { ?>

                <p class='no-result'>Pas de livre trouvés</p>

            <?php } elseif(count($books) != 0) {

                $keys = array_keys($books);
                foreach($books as $book) { ?>
                    <tr>
                        <td>
                            <p class='list-text'><?= $book['ref'] ?></p>
                        </td>
                        <td>
                            <p class='list-text'><?= $book['title'] ?></a></p>
                        </td>
                        <td>
                            <p class='list-text'>aut</p>
                        </td>
                        <td>
                            <img src="<?= $book['cover_url'] ?>" alt="<?= $book['title'] ?>" class='book list-img'>
                        </td>
                    </tr>
                    <?php

                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
include 'includes/footer.php';
?>