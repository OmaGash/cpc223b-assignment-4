<?php
if(session_id()==""){
    session_start();
}
    echo "includes register\n";
    if(isset($_POST['register'])){
        echo 'it works';
        require 'inc_db.php';
        $username = $_SESSION['username'];
        $email = $_SESSION['mail'];
        $password = $_SESSION['pword'];
        $password2 = $_SESSION['pword2'];

        //header('Location: ../');
    }
    else{
        echo 'does not work';
        header("Location: ../register.php");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a-zA-Z0-9]*$/", $username))){
        header("Location: ../register.php?error=invalidmail");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?error=invalidmail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../register.php?error=invalidusername");
            exit();
        }
    else {
        $cmd = "SELECT username FROM users WHERE username =?";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_prepare($stmt, $cmd)){
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows();
            if ($result > 0) {
                header("Location: ../register.php?error=usertaken");
                exit();
            }
            else{
               $cmd = "INSERT INTO users (username, email, `password`) VALUES(?,?,?)";
               $stmt = mysqli_stmt_init($connection);
                if(!mysqli_prepare($stmt, $cmd)){
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashed = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['logged_in'] = true;
                    $_SESSION['registered'] = false;
                    header("Location: ../register.php?signup=success");
                    exit();
                }
            }
                }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
?>