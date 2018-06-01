<?php
  session_start();
?>

<!DOCTYPE html>
<html>
 <head>
    <style>
         .header{margin-top: 0;}
         .footer{margin-top: 100px;} 
		  .a{background-color: #e6f2ff;width: 1000px; height: 800px; margin-left: 170px; text-align: center; overflow :hidden; margin-bottom: 40px}
         img{padding-top: 30px; height: 300px; width: 400px;}
         .b{background-color: #fff;width: 500px; height: 70px;margin-top: 40px;margin-left:250px;font-family:Comic Sans MS}
		 .c{background-color: #fff;width: 300px; height: 250px;margin-top: 40px;margin-left:350px;overflow: hidden}
		 .c img {height: 200px;width: 200px}
               
		
    </style>
 </head>
 <body>
     
   
   <div class="header" <?php include 'header.php'; ?> ></div>
	   <?php
	require 'myfunctions.php';
        if( isset($_GET['action']) ){ //AND  $_GET['action'] == 'user_detailes()'){
			$id = $_GET['id'];
			$details = user_detailes($id);
			$photo = $details['photo'];
			$user = $details['user'];
			$email = $details['email'];
			$idstring = strval($id);
	      echo"
		  <div class='a'> 
		     <img src = 'images/$photo'>  
			 <div class='b'> $user </div>";
			
			   // include QR_BarCode class 
               include "QR_BarCode.php"; 

               // QR_BarCode object 
               $qr = new QR_BarCode(); 
			
               // create email QR code 
               $qr->email($email, 'subject', 'message');

			  // save QR code image
              $qr->qrCode(350,'images/cw-qr.png');
			
              // display QR code image
              // $qr->qrCode(10); 
			
			
			echo " <div class='c'> 
			 
			   <img src='images/cw-qr.png'>
			 
			</div>
		    ";  
	      }
       ?>
     
     <div class="footer" <?php include 'footer.php'; ?> > </div>
     

     
 </body>
</html>