<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能使用此功能\");\r\n";
		echo "location.href='com_home.html'"; 				
		echo "</script>"; 
   }else{
					//echo $_SESSION['kind'];
					$countname=$_SESSION['username']; 
					$id=$_GET["name"];		 			
					
		//echo $countname;
		//链接数据库
		$con = mysql_connect("localhost","root","");
		//连接是否成功
		if (!$con)
		  {
				die('Could not connect: ' . mysql_error());
		  }
		 
		 if(mysql_select_db("user_db", $con))
		 {
	        
			 if(!mysql_query("select * from race_user",$con)){
			$sql = "CREATE TABLE race_user 
			(
		    ID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(ID),
			RaceName varchar(60),
			UserName varchar(30)
			)";
			mysql_query($sql,$con);

		}
		$res =mysql_query("SELECT * FROM race_user WHERE RaceName='$id' AND UserName='$countname'");
		//echo "SELECT * FROM race_user WHERE RaceName='$id' AND UserName='$username'";

     // echo $username;
	 // echo mysql_query("SELECT * FROM person WHERE UserName=$username ");
		if(!mysql_num_rows($res)){
		$sql="INSERT INTO race_user(RaceName,UserName)
					VALUES('$id','$countname')";

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
				
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='user_home.html'"; 				
				echo "</script>"; 
		}else{
		        echo "<script language=\"JavaScript\">\r\n"; 
				echo " alert(\"已经报名参加比赛了，请不要重复报名。\");\r\n";
				echo "location.href='user_home.html'"; 				
				echo "</script>"; 
		}
		}
		
		  }	
		
?>