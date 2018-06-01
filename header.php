

<!DOCTYPE html>
<html>
 <head>
     <style>
         .header{ height: 70px; width: 100%; overflow:hidden; margin-top: 0px;}
         a{color:#fff;text-decoration: none;font-family: sans-serif}
         ul{list-style: none;float: left;}
         li{float: left; padding-left: 15px; padding-top: 7px;}
         a:hover{color: #cce6ff;}
     </style>
 </head>
 <body> 
     <div class="header" style="background-color:<?php echo $_SESSION["hcolor"]; ?>" >
         <ul>
             <li><a href="profile.php">profile</a></li>
             <li><a href="addpost.php">add post</a></li>
             <li><a href="home.php">home</a>     
             <li><a href="#">about us</a>  
             <li><a href="contuctus.php">contuct us</a>     
             <li><a href="usersetting.php">user setting</a></li>
             <li><a href="logout.php">logout</a>  
             <li><a href="users.php">users</a> 	 
         </ul>
    </div>    
 </body>
</html>