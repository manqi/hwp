<?php

  session_start(); 
  
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='user_home.html'"; 				
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
		  
		    if(!mysql_query("select * from person_info",$con)){
			$sql = "CREATE TABLE person_info 
			(
			personID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(personID),
			CountName varchar(30),
			UserName  varchar(30),
			UserSex varchar(10),
			UserBirthday varchar(50),
			UserCity  varchar(100),
			UserPhone  varchar(30),
			UserAddress  varchar(100),
			UserEmail  varchar(30),
			UserZipcode  varchar(10),
			UserMycomment  varchar(400),
			UserWorkcomment  varchar(400),		
			UserSchool  varchar(50),
			UserDegree  varchar(30),
			UserSpecilty  varchar(100),
			UserPeriod  varchar(100),
			UserMajor  varchar(400),
			UserLanguage  varchar(100)
			
			)";
			mysql_query($sql,$con);

		}
		//echo $_SESSION['username'];
		$countname=$_SESSION['username'];
		//echo "SELECT * FROM person_info WHERE UserName='$countname'";
		//echo mysql_query("SELECT * FROM person_info WHERE CountName='$countname'");
		$res =mysql_query("SELECT * FROM person_info WHERE CountName='$countname'");
		//echo mysql_num_rows($res);
		if(!mysql_num_rows($res)){
		
			$sql="INSERT INTO person_info (CountName,UserName,UserSex,UserBirthday,UserCity,UserPhone,UserEmail,UserAddress,
			UserZipcode,UserMycomment,UserWorkcomment,UserSchool,UserDegree,UserSpecilty,UserPeriod,UserMajor,UserLanguage) VALUES 
			('$countname','$_POST[name]','$_POST[sex]',
			'$_POST[birthday]','$_POST[city]','$_POST[phone]','$_POST[email]','$_POST[address]',
			'$_POST[zipcode]','$_POST[mycomment]','$_POST[workcomment]','$_POST[school]','$_POST[degree]','$_POST[specilty]','$_POST[period]',
			'$_POST[major]','$_POST[language]')" ;

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
		
				echo "1 record added";
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='user_home.html'"; 				
				echo "</script>"; 

		}else{
		    mysql_query("UPDATE person_info SET UserName='$_POST[name]',UserSex='$_POST[sex]',UserBirthday='$_POST[birthday]',UserCity='$_POST[city]',UserPhone='$_POST[phone]',
			UserEmail='$_POST[email]',UserAddress='$_POST[address]',UserZipcode='$_POST[zipcode]',UserMycomment='$_POST[mycomment]',UserWorkcomment='$_POST[workcomment]',
			UserSchool='$_POST[school]',UserDegree='$_POST[degree]',UserSpecilty='$_POST[specilty]',UserPeriod='$_POST[period]',UserMajor='$_POST[major]',UserLanguage='$_POST[language]'
			WHERE CountName = '$countname'");
			
			echo "<script language=\"JavaScript\">\r\n"; 
			echo "location.href='user_home.html'"; 				
			echo "</script>"; 
		}
		mysql_close($con);
   }

?>

