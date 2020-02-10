<?php
if(session_id()==""){
    session_start();
}
if(isset($_SESSION['logged_in'])){
    $_SESSION['logged_in'] = false;
    header('Location: ../');
}
else{
    header('Location: ../');
}