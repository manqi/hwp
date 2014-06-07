<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='home.html'"; 				
		echo "</script>"; 
  
   }else{
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
		  
		    if(!mysql_query("select * from organization_info",$con)){
			$sql = "CREATE TABLE organization_info 
			(
			personID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(personID),
			CountName varchar(30),
			UserName  varchar(30),
			UserType varchar(30),
			UserRank varchar(50),
			UserPosition  varchar(50),
			UserPhone  varchar(30),
			UserEmail  varchar(30),
			UserAddress  varchar(100),	
			UserZipcode  varchar(10),
			UserWeibo  varchar(100),		
			UserWechat  varchar(50),
            UserComment  varchar(400)
			
			)";
			mysql_query($sql,$con);

		}
		//echo $_SESSION['username'];
		$countname=$_SESSION['username'];
		//echo mysql_query("SELECT * FROM organization_info WHERE CountName='$countname'");
		$res =mysql_query("SELECT * FROM organization_info WHERE CountName='$countname'");
		//echo mysql_num_rows($res);
		if(!mysql_num_rows($res)){
		
			$sql="INSERT INTO organization_info (CountName,UserName,UserType,UserRank,UserPosition,UserPhone,UserEmail,UserAddress,
			UserZipcode,UserWeibo,UserWechat,UserComment) VALUES 
			('$countname','$_POST[name]','$_POST[type]','$_POST[rank]','$_POST[position]','$_POST[phone]','$_POST[email]','$_POST[address]','$_POST[zipcode]','$_POST[weibo]','$_POST[wechat]','$_POST[comment]')" ;

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
		
				//echo "1 record added";
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='com_home.html'"; 				
				echo "</script>"; 

		}else{
		    mysql_query("UPDATE organization_info SET UserName='$_POST[name]',UserType='$_POST[type]',UserRank='$_POST[rank]',UserPosition='$_POST[position]',
			UserPhone='$_POST[phone]',UserEmail='$_POST[email]',UserAddress='$_POST[address]',UserZipcode='$_POST[zipcode]',UserWeibo='$_POST[weibo]',UserWechat='$_POST[wechat]',
			UserComment='$_POST[comment]' WHERE CountName = '$countname'");
			
			echo "<script language=\"JavaScript\">\r\n"; 
			echo "location.href='com_home.html'"; 				
			echo "</script>"; 
		}
		mysql_close($con);
   }

?>

