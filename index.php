<?php
    require"header.php";
?>


        <main>
            <?php 
            if(isset($_SESSION['logged_in'])){
                echo $_SESSION['logged_in'].$_SESSION['registered'];
                if ($_SESSION['logged_in']) {
                echo '<p>You are logged in</p><hr>
                ';

                }
                else {
                echo "<p>You are logged out</p>";
                }
            }
            else{
                echo '<a href="register.php">Make an account</a> now!';
            }
            ?>
        </main>

<?php
    require"footer.php";
?>