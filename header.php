<?php
    if(session_id() == ""){
        session_start();
    }

    if(isset($_POST['login'])){
        $_SESSION['username'] = $_POST['userid'];
        $_SESSION['password'] = $_POST['pword'];
        $_SESSION['logging_in'] = true;
        header("Location: includes/inc_login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <header>
            <nav>
                <?php
                    if(isset($_SESSION['logged_in'])){
                        if ($_SESSION['logged_in']) {
                            echo '<ul>
                                <a href="index.php">Home</a>
                                <a href="#">Portfolio</a>
                                <a href="#">About Me</a>
                                <a href="#">Contact</a>
                            </ul>
                                <form action="includes/inc_logout.php" method="post">
                                    <input type="submit" name="logout" value="Log Out">
                                </form>';
                        }
                        else{
                            echo '<div>
                                <form action="#" method="post">
                                    <input type="text" name="userid" placeholder="Username/Email" required autofocus>
                                    <input type="password" name="pword" placeholder="Password" required>
                                    <input type="submit" name="login" value="Log In">
                                </form>
                                <a href="register.php">Register</a>
                            </div>';
                        }
                    }
                    else {
                        echo '<div>
                                <form action="#" method="post">
                                    <input type="text" name="userid" placeholder="Username/Email" required>
                                    <input type="password" name="pword" placeholder="Password" required>
                                    <input type="submit" name="login" value="Log In">
                                </form>
                                <a href="register.php">Register</a>
                            </div>';
                    }
                ?>
            </nav>
        </header>