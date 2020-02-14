<?php
if(session_id() == ""){
session_start();
}
if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])){
    if(isset($_POST['register'])){
        echo 'asd';
        if($_POST['pword'] == $_POST['pword2']){
            $_SESSION['registered'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['pword'] = $_POST['pword'];
            $_SESSION['pword2'] = $_POST['pword2'];
        }
    }
    if(isset($_SESSION['registered'])){
        if($_SESSION['registered']){
            header('Location: includes/inc_register.php');
            exit;
        }
    }
    require 'header.php';
}
else{
    header ('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<?php
        if(isset($_GET['error'])){
            echo '<b color="#FF0000">Error: '.$_GET['error'].'</b>';
        }?>
        <main>
            <h1>Register</h1>
            <form action="#" method="POST">
                <input type="text" name="username" placeholder="Username" required autofocus>
                <input type="text" name="mail" placeholder="Email" required>
            <?php
                if(isset($_POST['pword'])){
                    if($_POST['pword'] != $_POST['pword2']){
                        echo 'Passwords do not match.';
                    }
                }
            ?>
                <input type="password" name="pword" placeholder="Password" required>
                <input type="password" name="pword2" placeholder="Confirm Password" required>
                <input type="submit" name="register" value="Register">
            </form>
        </main>
<?php
    require "footer.php";
?>
</html>
