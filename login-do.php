<?php

    session_start();

    if(isset($_POST["user"], $_POST["pass"])){

            $user = $_POST["user"];
            $pass = $_POST["pass"];

            if($user=="team" && $pass=="1234"){
				$_SESSION["logged"] = time();
            }
            else{
                echo "<h1 color='red'>The was an error!</h1><br><br><a href='login.php'>Try Again</a>";
            }

            header('location: admin.php');

      }
      else{

            echo "Not Submitted Properly. Try again.";

      }
    

?>