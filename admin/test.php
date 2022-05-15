<?php

include 'checkPw.php';
var_dump(password_verify('1234', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C'));die;

/*
$nbParams = count($book);
var_dump($nbParams);

function getPost(){
    for ($i=1;$i<$nbParams;$i++){
        if ($i == $nbParams-1){
            !empty($_POST['$param']);
        } else {
            !empty($_POST['$param'])."&&";
        }
    }
}
*/