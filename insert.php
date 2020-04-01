<?php
  $conn=new mysqli("localhost","root","","chat");

  $name=$_COOKIE['usr'];
  $msg=htmlspecialchars($_POST['mess']);
  date_default_timezone_set("Asia/Kolkata");
  $time=date("h:i");
  
 
  if($conn->connect_error){
      echo "connection error";
  }
  else{
      $sql="insert into messages(name,msg,time) values('".$name."','".$msg."','.$time.')";
      $conn->query($sql);
  }

?>