<?php
  $code = "";
  if(isset($_POST["code"])){
    $code = $_POST["code"];
  }

  $fp = fopen('view/view.php', 'w');
  foreach($code as $str){
    fwrite($fp, $str);
  }
  fclose($fp);
