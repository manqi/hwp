

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>参赛者信息</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="assets/css/docs.css" rel="stylesheet" type="text/css">
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<style>
body {
	padding-top: 0px;
	padding-bottom: 20px;
	background-image: url(assets/img/bg.jpg);
	background-size: 100%;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.starter-template {
	padding: 40px 15px;
	text-align: center;
}
#main-nav {
	background: #222;
}
.nav.nav-tabs .person {
	float: right;
}
.nav.nav-tabs li a {
	color: #C6F;
}
#navi {
	height: 38px;
}
#main{
	width:940px;
	margin-top:20px;
	background:rgba(255,255,255,0.5);
	padding:20px;
}
#main #logo {
	height: 100px;
	width: 150px;
}
#submit {
	width:150px;
	margin-right: auto;
	margin-left: auto;
}
#main .row .span9 .table-hover tr td {
	text-align:center;
}
</style>
</head>

<body>
<div class="container" id="navi">
<ul class="nav nav-tabs">
	<li class="active"><a href="com_home.html">首页</a></li>
	<li><a href="com_overview.html">网站概况</a></li>
	<li><a href="com_studycompetition_show.php">最新赛事</a></li>
    <li class="dropdown person"><a class="dropdown-toggle" data-toggle="dropdown" href="#">社团中心<b class="caret"></b></a>
    	<ul class="dropdown-menu">
		    <li><a href="logout.php">注销登录</a></li>
        	<li><a href="com_info.php">社团信息</a></li>
            <li><a href="com_info_modify.php">修改资料</a></li>
            <li><a href="com_launch.php">比赛发布</a></li>
			<li><a href="com_competition_manage.php">比赛管理</a></li>
           
        </ul>
    </li>
</ul>
</div>

<div class="container" id="main">
	<div class="row">
    	<div class="span2">
        	<img src="assets/img/u19.png" width="100%" height="100%">
    	</div>
        <div class="span7">
        	<h1>比赛</h1>
            <p>校园社团</p>
        </div>
        
        <div class="span9">
        	<h3 class="page-header">参赛者基本信息</h3>
            <table class="table-hover table" style="width:100%">
			 <tr>
                	<td>参赛者姓名</td>
                    <td>参赛者邮箱</td>
                    <td>参赛者移动电话</td>
               </tr>
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
	        
			if($result = mysql_query("SELECT * FROM race_user WHERE RaceName ='$id'"))
	       {
			  while($row = mysql_fetch_array($result)){ 			
			          $userName=$row["UserName"]; 
					  if($result2 = mysql_query("SELECT * FROM person_info WHERE CountName ='$userName'"))
					{
						while($row2= mysql_fetch_array($result2)){ 
						  $name=$row2["UserName"];
						  $email=$row2["UserEmail"];
						  $phone=$row2["UserPhone"];
						  echo "<tr>";
						  echo "<td>$name</td>";
						  echo "<td>$email</td>";
						  echo "<td>$phone</td>";
						  echo "</tr>";
						 
						}
					}

					}
			}
		  }	  
		}	
?>
           
            </table>
        </div>
    </div>

    <div id="submit">
	          <form   method="get" action="participators.php">
              <button  name="name" value=$id type="submit" class="btn btn-primary btn-large" />导出参赛者信息表</button>
		      </form>
    </div>
	
</div>
<script src="assets/js/bootstrap.js"></script> 
<script src="assets/js/bootstrap-button.js"></script>
</body>
</html>
