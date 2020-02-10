<?php
    if(session_id()==""){session_start();}
    if(isset($_SESSION['logged_in'])){
        header("Location: index.php");
    }
?>
<html>
<head>
    <title>Login</title>
</head>
    <body>
        <form action="includes/inc_login.php" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Username" name="user" autofocus>
            <input type="password" placeholder="Password" name="pass">
            <input type="submit" value="Log In" name="login">
        </form>
    </body>
</html>