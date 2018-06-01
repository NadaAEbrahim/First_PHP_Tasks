<?php
  session_start();
?>

<!DOCTYPE html>
<html>
 <head>
     <style>
         
          body{height: 520px;}
         .header{margin-top: 0;}
         .footer{margin-top: 20px;}
          .p{color: #00BFFF;font-family:Comic Sans MS; font-size: 40px;text-align: center; margin-top: 60px}
          .b{background:none; margin-left:30px; height:30px; width:130px;border:solid 3px ; color:#ff0066;margin-left: 600px;}
          a{text-decoration: none;color:#ff0066;}
         .img-text{background-color: #e6f2ff;width: 1000px; height: 500px; margin-left: 170px; text-align: center}
         .img{padding-top: 30px;}
         .text-cont{background-color: #fff;width: 500px; height: 70px;margin-top: 40px;margin-left:250px;font-family:Comic Sans MS}
         
         
     </style>
 </head>
 <body> 
    <div class="header" <?php include 'header.php';?> >
    </div>
     <p class="p">Welcom <?php echo $_SESSION["username"]; ?></p>
     <!--<form method="post">
      <input class="b" type="submit" name="go" value="home">
     </form>  -->
     
     
           <?php
          $id = $_SESSION["id"];
          require "myfunctions.php";
          $photo = get_photo($id);
          $text = get_text($id);
          
       ?> 
 <div class="img-text"> 
     
    <div class="img">
      <?php echo "<img src='images/$photo'  style='heigt:400px;width:400px;' >"; ?>
    </div>
     
    <div class="text-cont">      
       <div class="text">
          <?php echo "<p> $text </p>"; ?>
       </div>
    </div>  
     
 </div>     
     
     
         <div class="footer" <?php include 'footer.php';?> >
     </div>
     
     
     
     
     
     
  <?php
     
        $id = $_SESSION["id"];
     
     if(isset($_POST['go'])){
                  header('Location:home.php');
        }
     ?>
 </body>
</html>