<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
 
  
    *{
        padding:3px;
        margin:0; 
       
    }
    body{ 
      
        float:left;
        margin:0;
        padding:0;
        box-sizing:border-box;
        height:100vh;
        
      
     
       
        
     
    }
    .ele{
        position:relative;
        left:30vw;
        top:40px;

    

    }
    .ele img{
      width:60px;
      height:60px;
      

    }
    .title h1{
       padding:40px 0px;

    }
    .cont{
     
       position:absolute;
       left:23%;
  
    }
    form{    
         display:grid;
       grid-template-rows:repeat(4,1fr);
       grid-gap:20px;

    }
    .in{
        left:40px;
        position:relative;
        width:100px;
        height:25px;
        top:20px;
    }
    input:not(.in){
      
        border:none;
        border-bottom:1px solid black;
    }
    input:not(.in):focus{
         outline:none;
    }

</style>
<body>
   <?php if(isset($_COOKIE['usr'])){
       header("location:main.php");
   }
   else{?>
   <div class="ele">
      <img src="e1.png">
   </div>
   <div class="cont">
   <div class="title">
       <h1>Login</h1>
   </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
     <div class="usr-name">
        <label for="usr-name">username</label><br><br>
        <input type="text" name="usr-name" required><br>
     </div>
     <div class="pass">
         <label for="pass">password</label><br><br>
         <input type="password" name="pass" required><br>
     </div>
     <input class="in" type="submit" name="logsub">
    </form>
   </div><?php } ?>
</body>
<?php
     if(isset($_POST['logsub']))
     {
        $usr=htmlspecialchars($_POST['usr-name']);
        $pass=htmlspecialchars($_POST['pass']);
        if($usr=="paati" || $usr=="perandi")
        {
            if($pass=="damalu"){

                
                setcookie("usr",$usr,time()+(54*7*24*60*60));
                
                header("location:main.php");
            }
            else
            {
                echo "error password";
            }

        }
        else{
            echo "sorry wrong user name";
        }

     }
?>
</html> 
        