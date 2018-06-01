<?php
  session_start();
?>


<!DOCTYPE html>
<html>
 <head>
    <style>
         .header{margin-top: 0;}
         .footer{margin-top: 20px;}
         h1{color: #00BFFF;font-family:Comic Sans MS; margin-top: 50px}
        span{color: #00BFFF;}
        p{font-family:Comic Sans MS;font-size: 20px;}
        .contuct{border:solid 2px #00BFFF; margin-top: 10px; width:360px;height: 400px; background-color: #e6f2ff;overflow: hidden}
        form{padding: 20px;}
         .a{height:30px; width:200px;margin: 10px 0 10px 0; border:solid 1px #00BFFF}
         .b{background:none;; height:30px; width:130px;border:solid 3px #00BFFF; color:#00BFFF;margin-top: 20px}
    </style>
 </head>
 <body>
     
  <center>  
   <div class="header" <?php include 'header.php'; ?> > </div>
    <h1> Contuct Us </h1>
     <p><span>Phone</span> : +201012345678910 </p>
     <p><span>Email</span> : IEEE@gmail.com </p>
     
     <div class=contuct>
      <center><form method="post">
       <input class="a" type="email" name="e-mail" placeholder="enter E-mail"><br><br>
       <input class="a" type=password name="pass" placeholder="enter password"><br><br>
       <textarea rows="9" cols="30" placeholder="write your message" name="my_text"></textarea> <br><br>
       <input class="b" type="submit" name="go" value="contuct">
      </form></center>
     </div>     
     
   <div class="footer" <?php include 'footer.php'; ?> > </div>
     
     </center>  
     
 </body>
</html>