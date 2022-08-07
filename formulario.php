<?php
  $con = mysqli_connect('localhost', 'root', '', 'smpe');
  $result = mysqli_query($con, "SELECT * FROM usuarios");
  $msg = "";
  
?>