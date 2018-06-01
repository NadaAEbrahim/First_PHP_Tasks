<!DOCTYPE html>
<html>
 <head>
     <style>
         fieldset{border:solid 2px #00BFFF; margin:100px 550px;height: 350px; background-color: #e6f2ff}
         form{margin-top: 45px}
         .a{height:30px; width:200px;margin-top: 10px;margin: 10px 30px 0 30px; border:solid 1px #00BFFF}
         .b{background:none; margin-left:60px; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px}
         legend{color: #00BFFF}
     </style>
 </head>
 <body>
   <fieldset style="width:50px"><legend>signup</legend>
     <form method="post">
       <input class="a" type=text name="user-name" placeholder="enter user name" required><br><br>
       <input class="a" type="email" name="e-mail" placeholder="enter E-mail" required><br><br>
       <input class="a" type=password name="pass" placeholder="enter password" required><br><br>
       <input class="b" type="submit" name="go" value="signup">
         
     </form>       
   </fieldset>
     
   <?php
   
     require "myfunctions.php";
    
     
    if(isset($_POST['go'])){
      $userName= $_POST['user-name'];
      $Email= $_POST['e-mail'];
      $passWord= $_POST['pass'];
        
        create_conn_db();
        if(create_conn_db() == true){
            create_table();
             if(create_table() == true){
                 insert($userName,$Email,$passWord); 
                 header('Location:login.php');
                
             }
        }
    }
   ?>
     
 </body>
</html>






