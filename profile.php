<?php
   session_start();
  if($_SESSION["authorized"]==1){
      echo "session open";
  }
?>

<!DOCTYPE html>
<html>
 <head>
      <title>profile</title>
      <style>
         fieldset{border:solid 2px #00BFFF; margin:100px 550px;height: 450px; background-color: #e6f2ff}
         form{margin-top: 45px}
         .a{height:30px; width:200px;margin-top: 10px;margin: 10px 30px 0 30px; border:solid 1px #00BFFF}
         .b{background:none; margin-left:60px; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px}
         legend{color: #00BFFF}
     </style>
 </head>
 <body>
   <fieldset style="width:200px">
     <form method="post" enctype='multipart/form-data'>
      What color you want in header? <input class="a" type=color name="h-color"><br><br>
      What color you want in footer? <input class="a" type=color name="f-color"><br><br>
      upload photo <input class="c" type="file" name="photo"><br><br>
      <textarea rows="5" cols="30" placeholder="write your post" name="my_text"></textarea> <br><br>
       <input class="b" type="submit" name="go" value="go">
     </form>       
   </fieldset>
     
   <?php
     
     require "myfunctions.php";
     
     $id = $_SESSION["id"];
     
     if(isset($_POST['go'])){
     $headercolor= $_POST['h-color'];
     $footercolor= $_POST['f-color'];
     $image = $_FILES['photo']['name'];
     $text = $_POST['my_text']; 
     $imageName = 'photo';     
         
     $_SESSION["hcolor"] = $headercolor;
     $_SESSION["fcolor"] = $footercolor;
         
         
     
        if (change_color($id,$headercolor,$footercolor) == true){
            if (change_img($id,$image,$imageName) == true){
                if(add_text($id,$text) == true){
                header('Location:dashboard.php');
                }
                else if(add_text($id,$text) == false) echo "error";
            }
         }
     }
   ?>
     
 </body>
</html>