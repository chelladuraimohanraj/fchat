<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css" type="style/css">
    <script src="jquery.js"></script>
</head>
 
<script>
    $(document).ready(function(){
    
      var msgcount=0;
        setInterval(function(){cm();},100);
        setTimeout(() => {
            autoh()
        }, 200);
        

        function cm(){

              
                 $.ajax({

                      url:'checkmsg.php',
                      method:'post',
                      data:"msgcount="+msgcount,
                      
                       success:function(event){
                          
                            var out=JSON.parse(event);
                           
                            
                            for(m in out.msg){
                              var temp="<li class='"+out.name[m]+"'><p>"+out.msg[m]+"</p></li>";
                              $("#ord").append(temp);
                            }
                            msgcount=out.msgcnt;
                            
                        }

                 });
        
        }

      


        $("#input-form").submit(function(){
            event.preventDefault();
            var mess=$("#input-box").val();
            $.ajax({
                url:"insert.php",
                method:"post",
                data:{"mess":mess},
                async:true,
                success: function(){
                    setTimeout(() => {
                        autoh()
                        }, 100);
                }
            });

             var mess=$("#input-box").val("");
        });
 
    });
 
   
   
</script>
<style>
*{
    padding:0;
    margin:0;
    box-sizing:border-box;
}

body{
    width:100vw;
}
#messages{
    width:100%;
    height:80vh;
    overflow-y:scroll;

    
   
}

.input{
    width:90%;
    height:50px;
    bottom:0;
    padding:5px;
    position:fixed;
}

.header{
    background:blue;
    top:0;
    height:40px;
    width:100%;
    position:relative;
}
p{ 
    background:#dff6f0;
    width:max-content!important;
    max-width:60% !important;
    border-radius:10px;
    padding:5px;

}
p,li{
   
    width:60%; height:auto;
   color:#222831;
   
    
    
    
  
}
ul{
    display:grid;
}
.paati p{
    float:right;
    margin-right:10px;
    text-align:right;
    margin-right:10px;
}
.perandi p{
    margin-left:10px
}
#input-form{
    display:grid;
    grid-template-columns:80% 20%;
    grid-gap:5px;
}
ul li{
    list-style-type:none;
    
   margin:0px 0px 15px 0px;
    width:100% !important;
}
#input-box{
    border:1px solid blue;
    border-radius:25px;
    margin:5px;
    height:25px;
}
#send{
    background:blue;
    border-radius:25px;
    color:#fff;
    height:25px;
    width:70px;
    margin:5px;
}
h1{
    color:#fff;
    padding-left:10px;
    font-family: "Times New Roman", Times, serif;
}
</style>

<body>
    <div id="container">
    <div class="header">
        <h1><?php
         echo $_COOKIE['usr'];
        ?></h1>
    </div>
    <div id="messages">
        <ul id="ord">

        </ul>
    </div>
    <div class="input">
    
    <form id="input-form" method="post">
        <input type="text" id="input-box" required>
       
        <input type="submit" id="send" value="send">
    </form>
    </div>
    </div>
</body>
<script>
function getheight(){

var x=document.getElementById("messages").scrollHeight;
return x;
}
function autoh(){
var x=getheight();
$("#messages").scrollTop(x+70);
}

</script>
</html>