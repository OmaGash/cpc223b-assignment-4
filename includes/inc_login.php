<?php
if(session_id()==""){
    session_start();
}

if (isset($_SESSION['logged_in'])) {
    if($_SESSION['logged_in']){
        
    }
}

require 'inc_db.php';