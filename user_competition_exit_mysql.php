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
		 echo $countname;
		 echo $id;
	     
		mysql_query("DELETE FROM race_user WHERE RaceName='$id' AND UserName='$countname'");
		   
				
				echo "<script language=\"JavaScript\">\r\n"; 
				echo "location.href='user_home.html'"; 				
				echo "</script>"; 
				  
    
		}
		
		  }	
		
?>