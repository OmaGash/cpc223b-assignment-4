<?php
if(session_id()==""){
    session_start();
}

if (isset($_SESSION['logging_in'])) {
    $_SESSION['logged_in'] = false;
    require 'inc_db.php';
    $username = $_SESSION['username'];
    $password = $_SESSION['pword'];
    if($_SESSION['logged_in']){
        header('Location: ../');
    }
    else{
        $sql = "SELECT username FROM users WHERE username=? or email=?";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sql");
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $checker = password_verify($password, $row['password']);
                if (!checker) {
                header("Location: ../index.php?error=passerror");
                exit();
                }
                else if(checker){
                   header('Location: ../index.php');
                   $_SESSION['logged_in'] = true;
                    
                }
            }
            else{
                echo $row;
                header("Location: ../index.php?error=no user");
                exit();
            }
        }
    }
}
else {
    header('Location: ../');
}