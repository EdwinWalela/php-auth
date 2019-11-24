<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./main.css" />
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="pass" placeholder="password"/>
        <button>register</button>
    </form>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="pass" placeholder="password"/>
        <button>Login</button>
    </form>
</body>
</html>