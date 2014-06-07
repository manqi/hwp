<?php
  session_start();
  $username=$_POST["username"];
  $usercount=$_POST["email"];
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
 

    if(!mysql_query("select * from organization",$con)){
			$sql = "CREATE TABLE organization
			(
			personID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(personID),
			UserCount varchar(60),
			UserName varchar(50),
			UserPhone varchar(30),
			UserPassword varchar(30)
			)";
			mysql_query($sql,$con);

		}
     //echo $username;
	 //echo "SELECT * FROM organization WHERE UserCount=$usercount ";
	 $res =mysql_query("SELECT * FROM organization WHERE UserCount='$username' ");
		if(!mysql_num_rows($res)){
					$sql="INSERT INTO organization (UserCount,UserName, UserPhone, UserPassword)
					VALUES
					('$usercount','$username','$userphone','$password')";

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
					//echo "1 record added";
				
                $_SESSION["username"]= $usercount;
				$_SESSION["userkind"]="organization";
				setcookie("username", $usercount,time()+(60*60*24*30));
				setcookie("userkind","organization",time()+(60*60*24*30));
				
               // echo  $_SESSION["username"];
			   // echo  $_COOKIE["username"];
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='com_home.html'"; 				
				echo "</script>"; 

		}else{
				echo "<script language=\"JavaScript\">\r\n"; 
				echo " alert(\"邮箱已经被人注册了，请重新填写用户资料\");\r\n";
				echo "location.href='com_register.html'"; 				
				echo "</script>"; 
		}
		
	 
//关闭数据库连接
mysql_close($con);

?>