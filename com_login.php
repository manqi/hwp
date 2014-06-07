<?php
  session_start();
  $username=$_POST["username"];
  $password=MD5($_POST["password"]);



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
  
	if($result = mysql_query("SELECT * FROM organization WHERE UserCount ='$username'"))
	{
	echo "SELECT * FROM organization WHERE UserCount ='$username'";
	  if($row = mysql_fetch_array($result)){
	  echo $row["UserPassword"];
		if($row["UserPassword"]=$password){
			  $_SESSION["username"]=$username;
			  $_SESSION["userkind"]="user";
			  setcookie("username",$username,time()+(60*60*24*30));
			  setcookie("userkind","user",time()+(60*60*24*30));
			// echo  $_SESSION["username"];
			// echo  $_COOKIE["username"];
			echo "<script language=\"JavaScript\">\r\n"; 
			echo "location.href='com_home.html'"; 				
			echo "</script>"; 
		}else{
				echo "<script language=\"JavaScript\">\r\n"; 
				echo " alert(\"邮箱账号和密码不符合\");\r\n";
				echo "location.href='com_login.html'"; 				
				echo "</script>"; 
		}
		
	}else{
				echo "<script language=\"JavaScript\">\r\n"; 
				echo " alert(\"邮箱账号和密码不匹配\");\r\n";
				echo "location.href='com_login.html'"; 				
				echo "</script>"; 
				}
	}
//关闭数据库连接
mysql_close($con);

?>