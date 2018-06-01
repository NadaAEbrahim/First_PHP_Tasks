<?php
  session_start();
?>

<!DOCTYPE html>
<html>
 <head>
    <style>
         .header{margin-top: 0;}
         .footer{margin-top: 400px;}  
		 .users{color: #005;text-decoration: none;font-size: 25px;font-weight: bold; margin:20px 0 0 600px;}
		 .users:hover{color:crimson;}
    </style>
 </head>
 <body>
     
   
   <div class="header" <?php include 'header.php'; ?> ></div>
	
	 
<?php
require 'myfunctions.php';
$users = all_users();
for ($i=0 ; $i < count($users) ; $i++){
   echo"<a class='users' href='details.php?action=user_detailes({$users[$i]['id']})&id={$users[$i]['id']}'>{$users[$i]['user']}</a><br>";
	
}

?>
     
     <div class="footer" <?php include 'footer.php'; ?> >
    </div>
     

     
 </body>
</html>