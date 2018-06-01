<?php
  session_start();
?>

<!DOCTYPE html>
<html>
 <head>
     <style>
         fieldset{border:solid 2px #00BFFF; margin:100px 550px;height: 500px; background-color: #e6f2ff; overflow: hidden}
         form{margin-top: 45px}
         .a{height:30px; width:200px;margin-top: 10px;margin: 10px 30px 0 30px; border:solid 1px #00BFFF}
         .b{background:none; margin-left:60px; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px; margin-bottom: 30px}
         legend{color: #00BFFF}
     </style>
 </head>
 <body>
      <div class="header" <?php include 'header.php'; ?> ></div>
     
     
   <fieldset style="width:50px"><legend>user setting</legend>
     <form method="post">
       <input class="a" type=text name="user-name" placeholder="enter new username" required><br><br>
         <input class="b" type="submit" name="new-name" value="change username">
       <input class="a" type="password" name="old-pass1" placeholder="enter old password" required><br><br>
       <input class="a" type="password" name="old-pass2" placeholder="rewrite old password" required><br><br>    
       <input class="a" type="password" name="new-pass" placeholder="enter new password" required><br><br>   
         <input class="b" type="submit" name="user-pass" value="change password">
     </form>       
   </fieldset>
     
     <div class="footer" <?php include 'footer.php'; ?> >
     
   <?php
   
     require "myfunctions.php";
         
     $id = $id = $_SESSION["id"]; 
         
    if(isset($_POST['new-name'])){
        $user = $_POST['user-name'];
        if(change_name($id,$user) == true) {
            echo "name changed";
        }
    }
         
    if(isset($_POST['user-pass'])){
        $oldpass1 = $_POST['old-pass1'];
        $oldpass2 = $_POST['old-pass2'];  
        $newpass = $_POST['new-pass'];
        if($oldpass1 == $oldpass2){
          if(check_pass($id,$oldpass1) == $oldpass1) {
            if(change_pass($id,$newpass) == true){
                echo "password changed";
            }
          }
        }
    }
         
         

                
   ?>
     
 </body>
</html>






