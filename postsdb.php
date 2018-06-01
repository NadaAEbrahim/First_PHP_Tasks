  <?php
 
  //posts

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
    $sql = 'CREATE DATABASE IF NOT EXISTS myposts';
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
   $dbName = 'myposts';    
    
   // create connection 
   $conn = mysqli_connect($servername, $username, $password, $dbName);
   if(!$conn){
       die('connection_failed:'.mysqli_connect_error());
   }
    
  //create table 
    $sql ="CREATE TABLE IF NOT EXISTS posts(
           num int NOT NULL AUTO_INCREMENT,
           userid int NOT NULL,
           photos varchar(100) NOT NULL,
           usertext varchar(10000) NOT NULL,
           PRIMARY KEY (num)
           )ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
    
    if(mysqli_query($conn,$sql)){
        return true;
    }
    else return false;
    
    mysqli_close($conn);
}






function update_img($num,$photoName,$imageName){
     // the pass to store the aploaded imge
    $target = "images/".basename($photoName);
    
   // open database 
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myposts";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
    $sql="UPDATE posts SET photo='$photoName' WHERE num='$num'";
      mysqli_query($conn, $sql);
    // move the uploaded image into images folder
        if(move_uploaded_file($_FILES[$imageName]['tmp_name'],$target)){
                   return true;
      }
                   else return false;
    mysqli_close($conn);
}



function get_img($num)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myposts";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT photos FROM posts WHERE num='$num'";
$result = mysqli_query($conn, $sql); 
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$img = $row['photos'];
		 }
    }
        return $img;
    mysqli_close($conn);
}





function update_text($num,$text){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myposts";
   $conn = mysqli_connect($servername, $username, $password, $dbName);
        if(!$conn)
    {
	 die("Connection failed: " . mysqli_connect_error());
    }
   $sql="UPDATE posts SET text='$text'  WHERE num = $num ";
  if (mysqli_query($conn, $sql)) {
      return true; }
    else {
	return false;
    }
    mysqli_close($conn);
}


function get_text($num)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myposts";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT usertext FROM posts WHERE num='$num'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_assoc($result))
		 {
		 	$Text = $row['usertext'];
		 }
	}
	return $Text;
    mysqli_close($conn);
}






function get_numbers($id){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myposts";
   $conn = mysqli_connect($servername, $username, $password, $dbName);
        if(!$conn)
    {
	 die("Connection failed: " . mysqli_connect_error());
    }
   $sql="SELECT num FROM posts WHERE userid = '$id' ";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0)
	{
        //$mynum = array();
		 while($row = mysqli_fetch_assoc($result))
		 {
            $mynum[] = $row['num'];
		 }
	}
	return $mynum;
    mysqli_close($conn);   
}





function insert($id,$photoName,$imageName,$text){
    $target = "images/".basename($photoName);
   $servername = 'localhost';
   $username = 'root';  
   $password = '';
   $dbName = 'myposts';
       
    // create connection 
   $conn = mysqli_connect($servername, $username, $password, $dbName);
   if(!$conn){
       die('connection_failed:'.mysqli_connect_error());
   }
    
  //insert data  
    $sql = "INSERT INTO posts (userid,photos,usertext)
	VALUES ('$id' ,'$photoName' ,'$text')";
    
    if(mysqli_query($conn,$sql)){
        if(move_uploaded_file($_FILES[$imageName]['tmp_name'],$target)){
          return true;
        }
     }
    else   echo "Error" . $sql . mysqli_error($conn);  //return false; echo 
    
        mysqli_close($conn);
}




?>