<?php
  session_start();
  $username=$_POST["email"];
  $userphone=$_POST["phone"];
  $password=MD5($_POST["password2"]);

 // echo  $username;
 // echo  $userphone;
 // echo  $password;


//链接数据库
$con = mysql_connect("localhost","root","");
//连接是否成功
if (!$con)
  {
		die('Could not connect: ' . mysql_error());
  }
 if(!mysql_select_db("user_db", $con))
 {
	//创建 user_db 的数据库
	if (!mysql_query("CREATE DATABASE user_db",$con))
	  {
	  echo "Error creating database: " . mysql_error();
	  }
  }
 

    if(!mysql_query("select * from person",$con)){
			$sql = "CREATE TABLE person 
			(
			personID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(personID),
			UserName varchar(30),
			UserPhone varchar(30),
			UserPassword varchar(200)
			)";
			mysql_query($sql,$con);

		}
		$res =mysql_query("SELECT * FROM person WHERE UserName='$username' ");

     // echo $username;
	 // echo mysql_query("SELECT * FROM person WHERE UserName=$username ");
		if(!mysql_num_rows($res)){
					$sql="INSERT INTO person (UserName, UserPhone, UserPassword)
					VALUES
					('$username','$userphone','$password')";

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
					//echo "1 record added";
				
                $_SESSION["username"]=$username;
				$_SESSION["userkind"]="user";
				setcookie("username",$username,time()+(60*60*24*30));
				setcookie("userkind","user",time()+(60*60*24*30));
               // echo  $_SESSION["username"];
			   // echo  $_COOKIE["username"];
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='user_home.html'"; 				
				echo "</script>"; 

		}else{
				echo "<script language=\"JavaScript\">\r\n"; 
				echo " alert(\"邮箱已经被人注册了，请重新填写用户资料\");\r\n";
				echo "location.href='user_register.html'"; 				
				echo "</script>"; 
		}
		
	 
//关闭数据库连接
mysql_close($con);

?>