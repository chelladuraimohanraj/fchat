<?php
    session_start();
    $conn= new mysqli("localhost","root","","chat");
    $msg=array();
    $time=array();
    $name=array();
    $msgcount=$_POST['msgcount'];
    $sql="select * from messages where sno>".$msgcount;
    $result=$conn->query($sql);
    $out=new \stdClass();
    
    if($result->num_rows>0){
        $i=0;
    while($data=$result->fetch_assoc()){

        $msg[$i]=$data['msg'];
        $time[$i]=$data['time'];
        $name[$i]=$data['name'];
        $i++;
    }
}
    $sql="select * from messages";
    $tout=$conn->query($sql);

    $out->msg=$msg;
    $out->time=$time;
    $out->name=$name;
    $out->msgcnt=$tout->num_rows;
    $result=json_encode($out);
    echo $result;
    
?>