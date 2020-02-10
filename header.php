<?php
    if(session_id() == ""){
        session_start();
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
                                <form action="includes/inc_login.php" method="post">
                                    <input type="text" name="userid" placeholder="Username/Email" required>
                                    <input type="password" name="pword" placeholder="Password" required>
                                    <input type="submit" name="login" value="Log In">
                                </form>
                                <a href="register.php">Register</a>
                            </div>';
                        }
                    }
                    else {
                        echo '<div>
                                <form action="includes/inc_login.php" method="post">
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