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
					$id=$_GET["name"];		 			
					$userName=""; 
					$userPlace="";
					$userTime="";
					$userStart="";
					$userEnd="";
					$userType="";
					$userCondition="";
					$userIntroduction="";		
					$creatTime="";	
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
	        
			if($result = mysql_query("SELECT * FROM organization_race WHERE personID ='$id'"))
	       {
			  if($row = mysql_fetch_array($result)){ 			
					$userName=$row["UserName"]; 
					$userPlace=$row["UserPlace"];
					$userTime=$row["UserTime"];
					$userStart=$row["UserStart"];
					$userEnd=$row["UserEnd"];
					$userType=$row["UserType"];
					$userCondition=$row["UserCondition"];
					$userIntroduction=$row["UserIntroduction"];			
					$creatTime=$row["CreatTime"];			
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
<title>发布比赛</title>
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
 <script language=JavaScript>
<!--
function InputCheck(LoginForm)
{ 

     if (LoginForm.racename.value ==""|LoginForm.type.value =="" |LoginForm.place.value ==""|LoginForm.time.value ==""|
 LoginForm.start.value ==""|LoginForm.end.value ==""|LoginForm.condition.value ==""|LoginForm.introduction.value ==""
  )
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
			<li><a href="com_competition_manage.php">比赛管理</a></li>
            </ul>
        </div>
        <div class="span9" id="info">
        <form name="LoginForm"  method="post" action="competition_info_modify_mysql.php" onSubmit="return InputCheck(this)">
            <table width="100%">
                <tr>
                    <td><h3>发布比赛信息<small>所有项必填</small></h3></td>
                </tr>
                <tr>
				
                	<td><span>比赛名称 : </span>
                    <?php echo" <input name=\"racename\" type=\"text\" class=\"input-xlarge\" value=\"$userName\"> ";?></td>
                    <td><span>比赛性质 : </span>
                    <select name="type" class="input-large">
                    <option value="学术科技类">学术科技类</option>
                    <option value="体育竞技类">体育竞技类</option>
                    <option value="歌唱舞蹈类">歌唱舞蹈类</option>
                    </select>
                    </td>
                </tr>
                <tr>
                	<td><span>举办地点 : </span>
                    <?php echo" <input name=\"place\" type=\"text\" class=\"input-xlarge\" value=\"$userPlace\">";?></td>
                    <td><span>报名截止 : </span>
                    <?php echo" <input name=\"time\" type=\"text\" class=\"input-xlarge\"value=\"$userTime\">";?></td>
                </tr>
                <tr>
                	<td><span>初赛日期 : </span>
                    <?php echo" <input name=\"start\" type=\"text\" class=\"input-xlarge\"value=\"$userStart\">";?></td>
                    <td><span>决赛日期 : </span>
                    <?php echo" <input name=\"end\" type=\"text\" class=\"input-xlarge\"value=\"$userEnd\">";?></td>
                </tr>
                
                </table>
                <table>
                <tr>
                    <td><h4>比赛要求</h4></td>
                </tr>
                <tr>
                    <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <?php echo" <textarea rows=\"8\" name=\"condition\" class=\"input-xxlarge\">$userCondition</textarea>";?></td>
                </tr>
                <tr>
                    <td><h4>详细描述</h4></td>
                </tr>
                <tr>
                    <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <?php echo" <textarea rows=\"8\" name=\"introduction\" class=\"input-xxlarge\" >$userIntroduction</textarea>";?></td>
                </tr>
				
                <tr>
                 <?php 
				      echo  "<td><button  name=\"name\" value=$id type=\"submit\" />修改比赛资料</button></td>";?>
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
