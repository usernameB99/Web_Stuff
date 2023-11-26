<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = htmlentities($_POST["name"]);
    $email = htmlentities($_POST["email"]);
    echo "hello $name this is your email $email";

    echo "this message is received by POST";

} else{

    $name = htmlentities($_GET["name"]);
    $email = htmlentities($_GET["email"]);
    echo "hello $name this is your email $email";

    echo "this message is received by GET";
}


    



?>