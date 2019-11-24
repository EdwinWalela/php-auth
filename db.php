<?php
    session_start();
   // This function establishes db connection
    function connect(){
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $db = "login";
        return new mysqli($servername,$username,$pass,$db);
    }
    // This function recieves a username and password 
    // and creates a new user & stores it into the db
    // after account creation the user is redirected 
    // to the index page in order to login
    function register($username,$password){
        $conn = connect(); // connect to db
        $password = sha1($password); // hash password before saving it to the db
        // notice 'userID' is not included since the primary key has the attribute 'AUTO_INCREMENT'
        $sql = "INSERT INTO users (username,pass) VALUES('".$username."','".$password."')";
        if($conn->query($sql)){
            header("Location: ./index.php"); // redirect to index.phph
        }else{
            echo($conn->error); // print error
            // header("Location: ./index.php?register=fail"); 
        }
        
    }

    // This function authenticates a user. It recieves a username and password(plain-text)
    // the password is hashed and then is compared with the stored password
    // if they match user is redirected to the profile
    // session is used to store username
    function login($username,$password){
        $conn = connect(); // connect to db
        $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
        $result = $conn->query($sql); 
        // convert result to an associative array
        $result = $result->fetch_assoc();

        $password = sha1($password); // hash password

        // compare password provided during login with stored password
        if($result["pass"] === $password){
            $_SESSION["username"] = $result["username"];
            header("Location: ./profile.php"); // redirect to user profile
        }else{
            header("Location: ./index.php?login=fail"); // redirect back to index.php
        }
    }
?>