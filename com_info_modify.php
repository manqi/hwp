<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='home.html'"; 				
		echo "</script>"; 
   }else{
					//echo $_SESSION['kind'];
                    $countname=$_SESSION['username'];
					$userName=""; 
					$userType="";
					$userRank="";
					$userPosition="";
					$userPhone="";		
					$userEmail="";
					$userAddress="";
					$userZipcode="";
					$userWeibo="";
					$userWechat="";
					$userComment="";
                    
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
	
			if($result = mysql_query("SELECT * FROM organization_info WHERE CountName = '$countname'"))
	       {
		
			if($row = mysql_fetch_array($result)){        
					$userName=$row["UserName"]; 
					$userType=$row["UserType"];
					$userRank=$row["UserRank"];
					$userPosition=$row["UserPosition"];
					$userPhone=$row["UserPhone"];		
					$userEmail=$row["UserEmail"];
					$userAddress=$row["UserAddress"];
					$userZipcode=$row["UserZipcode"];
					$userWeibo=$row["UserWeibo"];
					$userWechat=$row["UserWechat"];
					$userComment=$row["UserComment"];
					//echo $userMycomment;
						}
			}
		  }	  
		}	
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>社团信息修改</title>
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
#cover {
	height: 300px;
}
#basic {
	width: 1170px;
	height: 100px;
	background: rgba(255,255,255,0.5);
}
#content {
	margin-top: 20px;
}
#content .row #navbar {
	min-height: 560px;
	background-image: url(assets/img/left2.jpg);
	background-repeat: no-repeat;
	background-size: 100%;
	border-radius: 2px;
	box-shadow: 5px 3px 3px #232323;
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
#content .row #navbar #left-nav li a {
	color: #900;
	font-weight: bolder;
}
#content .row #info {
	min-height: 560px;
	width: 69%;
	padding-left: 20px;
	padding-right: 20px;
	background: rgba(255,255,255,0.5);
	border-radius: 2px;
	box-shadow: 5px 3px 3px #232323;
}
</style>
 <script language=JavaScript>
<!--
function InputCheck(LoginForm)
{ 
   if (LoginForm.name.value ==""|LoginForm.type.value ==""|LoginForm.rank.value ==""|LoginForm.position.value ==""
   |LoginForm.phone.value ==""|LoginForm.email.value ==""|LoginForm.address.value ==""|LoginForm.zipcode.value ==""
   |LoginForm.weibo.value ==""|LoginForm.wechat.value ==""|LoginForm.comment.value =="")
  {
    alert("资料需要填写完整!");
    return (false);
  }   
}
//-->
</script>
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

</div>
<div class="container" id="content">
    <div class="row">
        <div class="span3" id="navbar">
            <ul class="nav nav-list" id="left-nav">
              <li><a href="com_info.php">社团信息</a></li>
            <li><a href="com_info_modify.php">修改资料</a></li>
            <li><a href="com_launch.php">比赛发布</a></li>
			<li><a href="com_competition_manage.php">比赛</a></li>
            </ul>
        </div>

		
        <div class="span9" id="info">
            <form name="LoginForm"  method="post" action="com_info_modify_mysql.php" onSubmit="return InputCheck(this)">
                <table width="100%">
                    <tr>
                        <td><h4>基本信息</h4></td>
                    </tr>
                    <tr>
                        <td><span>社团全称 : </span>
                            <?php echo"<input name=\"name\" type=\"text\" class=\"input-xlarge\" value=$userName>"?></td>
                        <td><span>社团性质 : </span>
                             <?php echo"<input name=\"type\" type=\"text\" class=\"input-xlarge\"value=$userType>"?></td>
                    </tr>
                    <tr>
                        <td><span>社团级别 : </span>
                             <?php echo"<input name=\"rank\" type=\"text\" class=\"input-xlarge\"value=$userRank>"?></td>
                        <td><span>所在校区 : </span>
                             <?php echo"<input name=\"position\" type=\"text\" class=\"input-xlarge\"value=$userPosition>"?></td>
                    </tr>
                    <tr>
                        <td><h4>联系方式</h4></td>
                    </tr>
                    <tr>
                        <td><span>联系电话 : </span>
                             <?php echo"<input name=\"phone\" type=\"text\" class=\"input-xlarge\"value=$userPhone>"?></td>
                        <td><span>电子邮箱 : </span>
                             <?php echo"<input name=\"email\" type=\"text\" class=\"input-xlarge\"value=$userEmail>"?></td>
                    </tr>
                    <tr>
                        <td><span>社团地址 : </span>
                             <?php echo"<input name=\"address\" type=\"text\" class=\"input-xlarge\"value=$userAddress>"?></td>
                        <td><span>邮政编码 : </span>
                             <?php echo"<input name=\"zipcode\" type=\"text\" class=\"input-xlarge\"value=$userZipcode>"?></td>
                    </tr>
					   <tr>
                        <td><h4>对外宣传</h4></td>
                    </tr>
                    <tr>
                        <td><span>社团微博 : </span>
                             <?php echo"<input name=\"weibo\" type=\"text\" class=\"input-xlarge\"value=$userWeibo>"?></td>
                        <td><span>社团微信 : </span>
                             <?php echo"<input name=\"wechat\" type=\"text\" class=\"input-xlarge\"value=$userWechat>"?></td>
                    </tr>
                 
                </table>
                <table>
                    <tr>
                        <td><h4>社团简介</h4></td>
                    </tr>
                    <tr>
                        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                             <?php echo"<textarea rows=\"3\" name=\"comment\" class=\"input-xxlarge\">$userComment</textarea>"?></td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn btn-primary" name="submit" value="保存修改"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/bootstrap.js"></script> 
<script src="assets/js/bootstrap-button.js"></script>
</body>
</html>
