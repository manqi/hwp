<?php
  session_start(); 
   if(!isset($_SESSION['username'])){
		echo "<script language=\"JavaScript\">\r\n"; 
		echo "alert(\"登录之后，才能编辑用户资料\");\r\n";
		echo "location.href='home.html'"; 				
		echo "</script>"; 
   }else{
   
					$userName=""; 
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
<title>个人信息修改</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="assets/css/docs.css" rel="stylesheet" type="text/css">
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<style>
body {
	padding-top: 20px;
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
	border-radius: 5px;
}
.nav.nav-tabs .person {
	float: right;
}
.container .nav.nav-tabs li a {
	color: #C6F;
}
#navi {
	height: 38px;
}
.container #cover {
	height: 250px;
}
.container #content {
}
#basic {
	width: 1170px;
	height: 100px;
	background: rgba(255,255,255,0.5);
}
#header {
	height: 150px;
	width: 120px;
	margin-left: 100px;
	margin-top: -75px;
}
#content {
	width: 700px;
	padding: 20px;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 20px;
	background: rgba(255,255,255,0.3);
	color: #000;
}
</style>
 <script language=JavaScript>
<!--
function InputCheck(LoginForm)
{ 
   if (LoginForm.name.value ==""|LoginForm.sex.value ==""|LoginForm.birthday.value ==""|LoginForm.city.value ==""|LoginForm.phone.value ==""|LoginForm.major.value ==""
   |LoginForm.email.value ==""|LoginForm.address.value ==""|LoginForm.zipcode.value ==""|LoginForm.school.value ==""|LoginForm.mycomment.value ==""
   |LoginForm.degree.value ==""|LoginForm.period.value ==""|LoginForm.language.value ==""|LoginForm.specilty.value ==""|LoginForm.workcomment.value =="")
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
    <div class="container" id="cover"> <img src="assets/img/u76.jpg" style="width:100%; height:100%;"> </div>
    <div class="container" id="basic">
        <div id="header"> <img src="assets/img/u78.jpg" style="width:100%; height:100%;"> </div>
    </div>
</div>

<form name="LoginForm"  method="post" action="user_info_modify_mysql.php" onSubmit="return InputCheck(this)">
<div id="content" style="margin-top:20px">
    <table width="100%">
        <tr>
            <td><h4>基本信息</h4></td>
        </tr>
        <tr>
            <td><span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 : </span>
              <?php echo" <input name=\"name\" type=\"text\" class=\"input-large\" value='$userName'></td>
			  " ?>
            <td><span>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别 : </span>
              <?php echo"<input name=\"sex\" type=\"text\" class=\"input-large\"value=$userSex></td>
			    " ?>
        </tr>
        <tr>
            <td><span>出生年月 : </span>
               <?php echo"<input name=\"birthday\" type=\"text\" class=\"input-large\"value=$userBirthday></td>
			   "?>
            <td><span>所在城市 : </span>
                <?php echo"<input name=\"city\" type=\"text\" class=\"input-large\"value=$userCity></td>
				"?>
        </tr>
        <tr>
            <td><h4>联系方式</h4></td>
        </tr>
        <tr>
            <td><span>联系电话 : </span>
                <?php echo"<input name=\"phone\" type=\"text\" class=\"input-large\"value=$userPhone></td>
				"?>
            <td><span>电子邮箱 : </span>
               <?php echo"<input name=\"email\" type=\"text\" class=\"input-large\"value=$userAddress></td>"?>
        </tr>
        <tr>
            <td><span>通信地址 : </span>
                <?php echo"<input name=\"address\" type=\"text\" class=\"input-large\" value=$userEmail></td>"?>
            <td><span>邮政编码 : </span>
                <?php echo"<input name=\"zipcode\" type=\"text\" class=\"input-large\"value=$userZipcode></td>"?>
        </tr>
    </table>
    
    <table>
    	<tr>
            <td><h4>自我评价</h4></td>
        </tr>
        <tr>
        	<td>
            	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            	<?php echo"<textarea rows=\"3\" name=\"mycomment\" class=\"input-xxlarge\" >$userMycomment</textarea>"?>
            </td>
        </tr>
        <tr>
            <td><h4>职业目标</h4></td>
        </tr>
        <tr>
        	<td>
            	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            	<?php echo"<textarea rows=\"3\" name=\"workcomment\" class=\"input-xxlarge\">$userWorkcomment</textarea>"?>
            </td>
        </tr>
    </table>
</div>

<div id="content">
	<table width="100%">
        <tr>
            <td><h4>教育背景</h4></td>
        </tr>
        <tr>
            <td><span>学校名称 : </span>
                <?php echo"<input name=\"school\" type=\"text\" class=\"input-large\"value=$userSchool></td>"?>
            <td><span>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历 : </span>
                <?php echo"<input name=\"degree\" type=\"text\" class=\"input-large\"value=$userDegree></td>"?>
        </tr>
        <tr>
            <td><span>专业名称 : </span>
                <?php echo"<input name=\"specilty\" type=\"text\" class=\"input-large\"value=$userSpecilty></td>"?>
            <td><span>起止时间 : </span>
                <?php echo"<input name=\"period\" type=\"text\" class=\"input-large\"value=$userPeriod></td>"?>
        </tr>
    </table>
    <table width="100%">
    	<tr>
        	<td>
          <span>主修课程 : </span><?php echo"<textarea rows=\"3\" name=\"major\" class=\"input-xxlarge\">$userMajor</textarea>"?>
            </td>
        </tr>
        <tr>
            <td><h4>语言能力</h4></td>
        </tr>
        <tr>
        	<td>
            	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            	<?php echo"<input name=\"language\" type=\"text\" class=\"input-large\" value=$userLanguage>"?>
            </td>
        </tr>
        <tr>
        	<td>
            	<button name="submit" class="btn btn-block btn-primary btn-large" type="submit">保存资料</button> 
            </td>
        </tr>
    </table>
</div>
</form>

<script src="assets/js/bootstrap.js"></script> 
<script src="assets/js/bootstrap-button.js"></script>
</body>
</html>