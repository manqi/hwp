<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='home.html'"; 				
		echo "</script>"; 
   }else{
					$userName=" "; 
					$userSex="";
					$userBirthday="";
					$userCity="";
					$userPhone="";
					$userAddress="";
					$userEmail="";
					$userZipcode="";
					$userMycomment="";
					$userWorkcomment="";
					$userSchool="";
					$userDegree="";
					$userSpecilty="";
					$userPeriod="";
					$userMajor="";
					$userLanguage="";
        $countname=$_SESSION['username'];
		//链接数据库
		$con = mysql_connect("localhost","root","");
		//连接是否成功
		if (!$con)
		  {
				die('Could not connect: ' . mysql_error());
		  }
		 
		 if(mysql_select_db("user_db", $con))
		 {
		 
			if($result = mysql_query("SELECT * FROM person_info WHERE CountName = '$countname'"))
	       {
		   
			if($row = mysql_fetch_array($result)){
			
					$userName=$row["UserName"]; 
					$userSex=$row["UserSex"];
					$userBirthday=$row["UserBirthday"];
					$userCity=$row["UserCity"];
					$userPhone=$row["UserPhone"];
					$userAddress=$row["UserAddress"];
					$userEmail=$row["UserEmail"];
					$userZipcode=$row["UserZipcode"];
					$userMycomment=$row["UserMycomment"];
					$userWorkcomment=$row["UserWorkcomment"];	
					$userSchool=$row["UserSchool"];
					$userDegree=$row["UserDegree"];
					$userSpecilty=$row["UserSpecilty"];
					$userPeriod=$row["UserPeriod"];
					$userMajor=$row["UserMajor"];
					$userLanguage=$row["UserLanguage"];
						}
			}
		  }	  
		}	
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>个人信息</title>

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="assets/css/docs.css" rel="stylesheet" type="text/css">
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.11.1.min.js"></script>

<style>
body{
	padding-top: 20px;
	background-image:url(assets/img/bg.jpg);
	background-size:100%;
	background-repeat:no-repeat;
	background-attachment:fixed;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}
#main-nav{
	background:#222;
	border-radius:5px;
}
.nav.nav-tabs .person {
	float: right;
}
.container .nav.nav-tabs li a {
	color: #C6F;
}
#navi{
	height:38px;
}
.container #cover {
	height: 250px;
}
.container #content {
}
#basic {
	width:1170px;
	height: 100px;
	background:rgba(255,255,255,0.5);
}
#header {
	height: 150px;
	width: 120px;
	margin-left:100px;
	margin-top:-75px;
}
#content {
	width:1130px;
	padding:20px;
	margin-bottom:20px;
	background:rgba(255,255,255,0.05);
	color:#000;
}

</style>
</head>

<body>
<div class="container" id="navi">
<ul class="nav nav-tabs">
	<li class="active"><a href="user_home.html">首页</a></li>
	<li><a href="user_overview.html">网站概况</a></li>
	<li><a href="user_studycompetition_show.php">最新赛事</a></li>
    <li class="dropdown person"><a class="dropdown-toggle" data-toggle="dropdown" href="#">个人中心<b class="caret"></b></a>
    	<ul class="dropdown-menu">
		<li><a href="logout.php">注销登录</a></li>
        	<li><a href="user_info.php">个人信息</a></li>
            <li><a href="user_info_modify.php">修改资料</a></li>
            <li><a href="user_competition_manage.php">比赛管理</a></li>
        </ul>
    </li>
</ul>
</div>

<div class="container">
	<div class="container" id="cover">
    	<img src="assets/img/u76.jpg" style="width:100%; height:100%;">
    </div>
    
    <div class="container" id="basic">
    	<div id="header">
        	<img src="assets/img/u78.jpg" style="width:100%; height:100%;">
        </div>
    </div>
    
</div>

<div class="container" id="content">
<div class="row">
	<div class="span11">
    	<h3 class="page-header">基本信息</h3>
    </div>
    <div class="span5">
       	<p>姓名:<?php echo $userName ?></p>
        <p>出生年月:<?php echo $userBirthday ?></p>
    </div>

    <div class="span5">
        <p>性别:<?php echo $userSex ?></p>
        <p>所在城市:<?php echo $userCity ?></p>
    </div>
    
    <div class="span11">
    	<h3 class="page-header">联系方式</h3>
    </div>
    <div class="span5">
       	<p>联系电话:<?php echo $userPhone ?></p>
        <p>通信地址:<?php echo $userAddress ?></p>
    </div>
    <div class="span5">
        <p>电子邮箱:<?php echo $userEmail ?></p>
        <p>邮政编码:<?php echo $userZipcode ?></p>
    </div>
        
    <div class="span11">
    	<h3 class="page-header">自我评价</h3>
        <p><?php echo $userMycomment ?></p>
    </div>
    
    <div class="span11">
    	<h3 class="page-header">职业目标</h3>
        <p><?php echo $userWorkcomment ?></p>
    </div>
    
    <div class="span11">
    	<h3 class="page-header">教育背景</h3>
    </div>
    <div class="span5">
       	<p>学校名称:<?php echo $userSchool?></p>
        <p>专业名称:<?php echo $userSpecilty ?></p>
    </div>
    <div class="span5">
        <p>学历:<?php echo $userDegree ?></p>
        <p>时间:<?php echo $userPeriod ?></p>
    </div>
    <div class="span11">
	  <h3 class="page-header">主修课程：</h3>
    	<p><?php echo $userMajor ?></p>
    </div>
    
    <div class="span11">
    	<h3 class="page-header">语言能力</h3>
        <p><?php echo $userLanguage ?></p>
    </div>
</div>
</div>

<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>

</body>
</html>
