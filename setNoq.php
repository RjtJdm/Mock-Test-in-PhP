<?php
      session_start();
      $s=$_REQUEST["v"];
      $_SESSION["noq"]=$s;
      echo "true"
?>