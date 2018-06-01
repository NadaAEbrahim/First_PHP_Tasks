<?php
  session_start();
?>


<!DOCTYPE html>
<html>
 <head>
    <style>
         .header{margin-top: 0;}
         .footer{margin-top: 20px;}
         .a{background-color: #e6f2ff;width: 1000px; height: 500px; margin-left: 170px; text-align: center; overflow :hidden; margin-bottom: 40px}
         img{padding-top: 30px; height: 300px; width: 400px;}
         .b{background-color: #fff;width: 500px; height: 70px;margin-top: 40px;margin-left:250px;font-family:Comic Sans MS}

	 </style>
 </head>
 <body>
     
    
   <div class="header" <?php include 'header.php'; ?> ></div>
     
      <?php
          $id = $_SESSION["id"];
          require "postsdb.php";  
          $numbers = get_numbers($id); 
          $text = get_text($id);
          //print_r ($numbers);
          //echo "$numbers[0]";
          //
     
     
        for ($i=0 ; $i < sizeof($numbers) ; $i++){
            $photo = get_img($numbers[$i]);
            $text = get_text($numbers[$i]);
            echo "<div class='a'> <img src = 'images/$photo'>  <div class='b'> $text </div> </div>" ;
        } 
          
       ?>  
    
     
     <div class="footer" <?php include 'footer.php'; ?> >
    </div>
     
    
     
 </body>
</html>


 