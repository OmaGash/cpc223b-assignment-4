<?php
if(session_id()==""){
    session_start();
}
    echo "includes register\n";
    if(isset($_SESSION['registered'])){
        echo 'it works';
        require 'inc_db.php';
        $username = $_SESSION['username'];
        $email = $_SESSION['mail'];
        $password = $_SESSION['pword'];
        $password2 = $_SESSION['pword2'];
        $_SESSION['logged_in'] = true;
        $_SESSION['registered'] = false;

        header('Location: ../');
    }
    else{
        echo 'does not work';
        header("Location: ../register.php");
        exit();
    }

    $sql
?>