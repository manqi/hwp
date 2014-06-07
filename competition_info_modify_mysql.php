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
		 
		    if(!mysql_query("select * from organization_race",$con)){
			
			$sql = "CREATE TABLE organization_race
			(
			personID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(personID),
			CountName varchar(30),
			UserName varchar(30),
			UserType varchar(30),
			UserPlace varchar(50),
			UserTime  varchar(50),
			UserStart  varchar(30),
			UserEnd  varchar(30),
			UserCondition  varchar(400),	
			UserIntroduction  varchar(400),
			CreatTime datetime,
			Number int(100)
			)";
			echo"22";
			mysql_query($sql,$con);
			echo"32";
               
		}
		//echo $_SESSION['username'];
		$countname=$_SESSION['username'];
		$id=$_POST["name"];
		$time=date('Y-m-d H:i:s');
		//echo $time;
		
		$res =mysql_query("SELECT * FROM organization_race WHERE personID='$id'");
		//echo mysql_num_rows($res);
		if(!mysql_num_rows($res)){
		
			$sql="INSERT INTO organization_race (CountName,UserName,UserType,UserPlace,UserTime,UserStart,UserEnd,UserCondition,
			UserIntroduction,CreatTime,Number) VALUES 
			('$countname','$_POST[racename]','$_POST[type]','$_POST[place]','$_POST[time]','$_POST[start]','$_POST[end]','$_POST[condition]','$_POST[introduction]','$time','0')" ;

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
		
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='com_home.html'"; 				
				echo "</script>"; 

		}else{
		    mysql_query("UPDATE organization_race SET UserName='$_POST[racename]',UserType='$_POST[type]',UserPlace='$_POST[place]',UserTime='$_POST[time]',UserStart='$_POST[start]',UserEnd='$_POST[end]',
			UserCondition='$_POST[condition]',UserIntroduction='$_POST[introduction]',CreatTime='$time'
			WHERE personID='$id'");	
			//echo $time;
			echo "<script language=\"JavaScript\">\r\n"; 
			echo "location.href='com_home.html'"; 				
			echo "</script>"; 
		}
		mysql_close($con);
   }
   

?>