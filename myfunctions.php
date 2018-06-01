<?php
  
function create_conn_db(){
   $servername = 'localhost';
   $username = 'root';  
   $password = '';
    
   // create connection 
   $conn = mysqli_connect($servername, $username, $password);
   if(!$conn){
       die("connection faild:" .mysqli_connect_error());
   }  
    
  //create db
    $sql = 'CREATE DATABASE IF NOT EXISTS myDB';
    if(mysqli_query($conn,$sql)){
        return true;
    }
    else return false;
    
    mysqli_close($conn);
}



function create_table(){
   $servername = 'localhost';
   $username = 'root';  
   $password = '';
   $dbName = 'myDB';    
    
   // create connection 
   $conn = mysqli_connect($servername, $username, $password, $dbName);
   if(!$conn){
       die('connection_failed:'.mysqli_connect_error());
   }
    
  //create table 
    $sql ="CREATE TABLE IF NOT EXISTS image(
           id int NOT NULL AUTO_INCREMENT,
           user varchar(100) NOT NULL,
           email varchar(200) NOT NULL UNIQUE KEY,
           pass varchar(40) NOT NULL UNIQUE KEY,
           header varchar(40) NOT NULL DEFAULT '#000',
           footer varchar(40) NOT NULL DEFAULT '#000',
           photo varchar(100) NOT NULL DEFAULT 'team-you.png',
           text varchar(10000) DEFAULT 'HELLO',
           PRIMARY KEY (id)
           )";
    
    if(mysqli_query($conn,$sql)){
        return true;
    }
    else return false;
    
    mysqli_close($conn);
}



function insert($user,$email,$pass){
   $servername = 'localhost';
   $username = 'root';  
   $password = '';
   $dbName = 'myDB';
       
    // create connection 
   $conn = mysqli_connect($servername, $username, $password, $dbName);
   if(!$conn){
       die('connection_failed:'.mysqli_connect_error());
   }
    
  //insert data  
    $sql = "INSERT INTO image (user,email,pass)
	VALUES ('$user' ,'$email' ,'$pass')";
    
    if(mysqli_query($conn,$sql)){
        return true;
    }
    else return false;
    
        mysqli_close($conn);
}



function check_user_pass($user,$pass){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbName = "myDB"; 
     
      $conn = mysqli_connect($servername,$username,$password,$dbName);
     if(!$conn){
         die("connection faild:" .mysqli_connect_error());
     }    
     
     $sql = "SELECT id FROM image WHERE user = '$user' AND pass = '$pass'";
     $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
     if ($num > 0){
          while($row = mysqli_fetch_assoc($result))
		 {
		 	$id=$row['id'];
         }
         return $id;
     }
         else return 0;
         
   mysqli_close($conn);
}



function change_color($id,$hcolor,$fcolor){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="UPDATE image SET header='$hcolor',footer='$fcolor' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    return true;
} else {
	return false;
}
    mysqli_close($conn);
}


function get_header_colors($id)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT header FROM image WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$headercolor=$row['header'];
		 }
	}
	return $headercolor;
    mysqli_close($conn);
}


function get_footer_colors($id)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT header FROM image WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$footercolor=$row['footer'];
		 }
	}
	return $foottercolor;
    mysqli_close($conn);
}




function change_img($id,$photoName,$imageName){
     // the pass to store the aploaded imge
    $target = "images/".basename($photoName);
    
   // open database 
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
    $sql="UPDATE image SET photo='$photoName' WHERE id='$id'";
      mysqli_query($conn, $sql);
    // move the uploaded image into images folder
        if(move_uploaded_file($_FILES[$imageName]['tmp_name'],$target)){
                   return true;
      }
                   else return false;
    mysqli_close($conn);
}



function get_photo($id)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT photo FROM image WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$img = $row['photo'];
		 }
	}
	return $img;
    mysqli_close($conn);
}



function add_text($id,$text){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
   $conn = mysqli_connect($servername, $username, $password, $dbName);
        if(!$conn)
    {
	 die("Connection failed: " . mysqli_connect_error());
    }
   $sql="UPDATE image SET text='$text' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
      return true; }
    else {
	return false;
    }
    mysqli_close($conn);
}


function get_text($id)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT text FROM image WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$myText = $row['text'];
		 }
	}
	return $myText;
    mysqli_close($conn);
}




function change_name($id,$user){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="UPDATE image SET user='$user' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    return true;
} else {
	return false;
}
    mysqli_close($conn);
}





function check_pass($id,$pass){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbName = "myDB"; 
     
      $conn = mysqli_connect($servername,$username,$password,$dbName);
     if(!$conn){
         die("connection faild:" .mysqli_connect_error());
     }    
     
     $sql = "SELECT pass FROM image WHERE id = '$id' AND pass = '$pass'";
     $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
     if ($num > 0){
          while($row = mysqli_fetch_assoc($result))
		 {
		 	$pass=$row['pass'];
         }
         return $pass;
     }
         else return 0;
         
   mysqli_close($conn);
}





function change_pass($id,$pass){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="UPDATE image SET pass='$pass' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    return true;
} else {
	return false;
}
    mysqli_close($conn);
}






function all_users(){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbName = "myDB"; 
     
      $conn = mysqli_connect($servername,$username,$password,$dbName);
     if(!$conn){
         die("connection faild:" .mysqli_connect_error());
     }    
     
     $sql = "SELECT * FROM image";
     $result = mysqli_query($conn, $sql);
	 $num = mysqli_num_rows($result);
     if ($num > 0)
	{
		for ($i=0 ; $i<$num ; $i++) {
		 $data[$i] = mysqli_fetch_assoc($result);
		}
		 
	}
	
	return $data;
    mysqli_close($conn);
}



function user_detailes($id){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbName = "myDB"; 
     
      $conn = mysqli_connect($servername,$username,$password,$dbName);
     if(!$conn){
         die("connection faild:" .mysqli_connect_error());
     }    
     
     $sql = "SELECT user,email,photo FROM image where id = $id";
     $result = mysqli_query($conn, $sql);
	 $num = mysqli_num_rows($result);
     if ($num > 0)
	{
		
		 while ($row = mysqli_fetch_assoc($result)){
			 $data = $row;
		 }
		
		 
	}
	
	return $data;
    mysqli_close($conn);
}




