<?php
 session_start();
?>
<!DOCTYPE html>
<html>
 <head>
       <style>
         fieldset{border:solid 2px #00BFFF; margin:100px 550px;height: 300px; background-color: #e6f2ff}
         form{margin-top: 35px}
         .a{height:30px; width:200px;margin-top: 10px;margin: 10px 30px 0 30px; border:solid 1px #00BFFF}
         .b{background:none; margin-left:60px; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px}
         legend{color: #00BFFF}
     </style>
 </head>
 <body>
   <fieldset style="width:50px"><legend>login</legend>
     <form method="post">
       <input class="a" type=text name="user" placeholder="enter user name" required><br><br>
       <input class="a" type=password name="passw" placeholder="enter password" required><br><br>
       <input class="b" type="submit" name="go" value="login">
     </form>       
   </fieldset>
     
   <?php
     
     require "myfunctions.php";
    if(isset($_POST['go'])){ 
     $myname= $_POST['user'];
     $mypass= $_POST['passw'];
        
    
         if(check_user_pass($myname,$mypass) != 0){
         $_SESSION["username"]=$myname;
         $_SESSION["id"]= check_user_pass($myname,$mypass);    
         $_SESSION["authorized"]=1;     
         echo "session open";
         header('Location:profile.php');
     }
        else if (check_user_pass($myname,$mypass) == false) echo "error";
    }
     
   ?>
     
 </body>
</html>