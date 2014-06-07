<?php
//处理中文文件名
$ua = $_SERVER["HTTP_USER_AGENT"];    
$filename = "参赛者名单.doc";    
$encoded_filename = urlencode($filename);    
$encoded_filename = str_replace("+", "%20", $encoded_filename); 

//生成文本文件
header("Content-Type: application/octet-stream");      
if (preg_match("/MSIE/", $ua) ) {      
    header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');      
} elseif (preg_match("/Firefox/", $ua)) {      
    header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');      
} else {      
    header('Content-Disposition: attachment; filename="' .  $filename . '"');      
} 
session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能使用此功能\");\r\n";
		echo "location.href='com_home.html'"; 				
		echo "</script>"; 
   }else{
		  
//文本文件的内存 
echo "						   参赛者名单\r\n";
echo "参赛者姓名                 参赛者邮箱                     参赛者联系方式\r\n";

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
	        
			if($result = mysql_query("SELECT * FROM race_user WHERE RaceName ='$id'"))
	       {
			  while($row = mysql_fetch_array($result)){ 			
			          $userName=$row["UserName"]; 
					  if($result2 = mysql_query("SELECT * FROM race_user WHERE RaceName ='$id'"))
					{
						while($row2= mysql_fetch_array($result2)){ 
						  $name=$row2["UserName"];
						  $email=$row2["UserEmail"];
						  $phone=$row2["UserPhone"];
						 
							echo "$name               $email                           $phone\r\n";
						 
						}
					}

					}
			}
		  }	
		  }
?>