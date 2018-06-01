<?php
   session_start();
  if($_SESSION["authorized"]==1){
      echo "session open";
  }
?>

<!DOCTYPE html>
<html>
 <head>
      <title>add post</title>
      <style>
         fieldset{border:solid 2px #00BFFF; margin:100px 550px;height: 400px; background-color: #e6f2ff}
         form{margin-top: 45px}
         .b{background:none; margin-left:60px; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px}
         legend{color: #00BFFF}
     </style>
 </head>
 <body>
     
      <div class="header" <?php include 'header.php';?> >
    </div>
     
     
   <fieldset style="width:200px">
     <form method="post" enctype='multipart/form-data'>
      upload photo <input class="c" type="file" name="photo"><br><br>
      <textarea rows="9" cols="30" placeholder="write your post" name="my_text"></textarea> <br><br>
       <input class="b" type="submit" name="go" value="post">
     </form>       
   </fieldset>
     
     
    <div class="footer" <?php include 'footer.php';?> >
     </div> 
     
     
   <?php
     
     require "postsdb.php";
     
     $id = $_SESSION["id"];
     
 if(isset($_POST['go'])){
     $image = $_FILES['photo']['name'];
     $text = $_POST['my_text']; 
     $imageName = 'photo';     
         
         
     if(create_conn_db() == true){
         if(create_table() == true){
             if (insert($id,$image,$imageName,$text) == true)
             echo "added suc";
     }
   }
 }
   ?>
     
 </body>
</html>