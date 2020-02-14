<?php
if(session_id()==""){
    session_start();
}
    $server_name = "localhost";
    $dbUsername = "root";
    $dbPass ="";
    $dbName = "cpc223b";

    $connection = mysqli_connect($server_name, $dbUsername, $dbPass, $dbName);

    if(!$connection){
        die("Error: ".mysqli_connect_error());
        
    }
?>