<?php
session_start();
//Attention : Une API ne doit sortir qu'un seul echo (la réponse)
for($i=0;$i<3;$i++){
    $value[$i] = rand(0,10);
}

echo json_encode($value);
?>