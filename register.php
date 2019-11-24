<?php
    // import db query functions
    require("./db.php");

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"];
        $password = $_POST["pass"];

        // call register function defined in db.php
        register($username,$password);
    }
?>
