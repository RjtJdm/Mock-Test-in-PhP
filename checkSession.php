<?php
      session_start();
      if( $_SESSION["usrnm"]=="admin"){
           echo "true";
      }
      session_unset();  
      session_destroy();
?>