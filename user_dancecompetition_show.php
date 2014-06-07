<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>比赛管理</title>

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="assets/css/docs.css" rel="stylesheet" type="text/css">
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.11.1.min.js"></script>

<style>
body{
	padding-top: 0px;
	padding-bottom:20px;
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
}
.nav.nav-tabs .person {
	float: right;
}
.nav.nav-tabs li a {
	color: #C6F;
}
#navi{
	height:38px;
}
#cover {
	height: 300px;
}
#basic {
	width:1170px;
	height: 100px;
	background:rgba(255,255,255,0.5);
}
#content {
	margin-top:20px;
}

#content .row #navbar {
	min-height:560px;
	background-image: url(assets/img/left2.jpg);
	background-repeat: no-repeat;
	background-size:100%;
	border-radius:2px;
	box-shadow:5px 3px 3px #232323;
}
#content .row #navbar #left-nav li {
	color: #222;
	height: 40px;
	line-height: 40px;
	text-align: center;
	font-size: 20px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
#content .row #info h4 {
	text-indent:20px;
}
#content .row #info p {
	text-indent:50px;
}
#content .row #navbar #left-nav li a {
	color: #900;
	font-weight: bolder;
}
#content .row #info {
	min-height: 560px;
	width:69%;
	padding-left:20px;
	padding-right:20px;
	background:rgba(255,255,255,0.5);
	border-radius:2px;
	box-shadow:5px 3px 3px #232323;
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

<div class="container" id="content">
	<div class="row">
    	<div class="span3" id="navbar">
        	<ul class="nav nav-list" id="left-nav">
             	<li><a href="user_studycompetition_show.php">学术科技类</a></li>
                <li><a href="user_dancecompetition_show.php">歌唱舞蹈类</a></li>
                <li><a href="user_gymcompetition_show.php">体育竞技类</a></li>
            </ul>
        </div>
        
        <div class="span9" id="info">
        	<h3 class="page-header">比赛管理</h3>
<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='com_home.html'"; 				
		echo "</script>"; 
   }else{
					//echo $_SESSION['kind'];
         $countname=$_SESSION['username']; 
         $type="歌唱舞蹈类";		 
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
	        
			if($result = mysql_query("SELECT * FROM organization_race WHERE UserType='$type' order by CreatTime desc"))
	       {
				echo  "<form  action=\"user_competition_info.php\" method=\"get\" >";
			while($row = mysql_fetch_array($result)){ 

					$Id=$row['personID'];			
					$userName=$row["UserName"]; 
					$userPlace=$row["UserPlace"];
					$userTime=$row["UserTime"];
					$userStart=$row["UserStart"];
					$userEnd=$row["UserEnd"];		
					//echo $userMycomment;
					
					echo  "<h4> $userName </h4>";
					echo  "<p>比赛地点:$userPlace</p>";
					echo  "<p>报名截止时间:$userTime</p>";
					echo  "<p>比赛初赛时间:$userStart</p>";
					echo  "<p>比赛决赛时间:$userEnd</p>";
					echo  "<button  name=\"name\" value=$Id type=\"submit\" />了解更多</button>";
			        echo  "<hr/>";
                    
					
			}
						echo"</form>";
			}
		  }	  
		}	
?>
           
      
			
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>

</body>
</html>
