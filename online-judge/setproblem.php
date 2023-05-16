<?php

session_start();
require_once("config.php");

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION["un"]))
{
	header("Location:login.php");
}

if(isset($_SESSION['un']))
{
	$username=$_SESSION['un'];
}

$mysql="SELECT  status from user WHERE name='$username'";
$snd=mysqli_query($conn,$mysql);
$arrow=mysqli_fetch_array($snd);

$st=$arrow['status'];

$access=0;

if($st=="Teacher" || $st=="Problem Setter" || $st=="Developer")
{
   $access=1;
}
else
{
    header("Location:home.php");
}




?>

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Set Problem</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="img/hstu.png">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js" </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js" </script>







</head>
<body>
<div class="main">
 <div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="home.php">HSTU OJ</a>
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
    </div>
    <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
    <li class="space"><a href="#"><i class="fa fa-code ispace"></i>COURCES</a></li>
      <li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>PROBLEMSET</a></li>
      <li class="space"><a href="#"><i class="fa fa-cogs ispace"></i>CONTESTS</a></li>
      <li class="space"><a href="#"><i class="fa fa-check-square ispace"></i>ABOUT</a></li>
      <li class="lgspace space"><a href="profile.php?user=<?php echo("$username"); ?>"><i class="fa fa-user ispace"></i><?php echo("$username"); ?></a></li>
      <li class="space"><a href="logout.php"><i class="fa fa-power-off ispace"></i>LOGOUT</a></li>
      
    </ul>
    </div>
</nav>
</div>
</div>



<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Create New Problem</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="archive.php" name="f2" method="POST">

<label for="ta">Enter Your Problem Name</label>
<input type="text" name="pname" class="form-control"><br><br>
<label for="in">Enter Problem Description</label>
<textarea name="description" class="form-control" rows="30" cols="80"><?php echo "<b>hi</b>"?></textarea><br><br>
<label for="ta">Enter Problem Author</label>
<input type="text" name="c2" class="form-control"><br><br>
<label for="ta">Enter Time Limit</label>
<input type="text" name="tll" title="Only float is allowed (Ex:3.00)" placeholder="1.00" class="form-control"><br><br>
<b>Enter Test Cases</b><br>
<textarea class="form-control" name="case" rows="30" cols="80"></textarea><br><br>
<b>Enter Output Of Test Cases</b><br>
<textarea class="form-control" name="result" rows="30" cols="80"></textarea><br><br>
<input type="submit" class="btn btn-success" value="Create Problem">


</form>



</div>
</div>

<div class="col-sm-4">

</div>
</div>
</div><br><br><br>


<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
</div>

<div class="col-sm-5">


<div class="fm">

<b>Beta Version-2023</b><br>
<b>Developed By Wrong Submission</b>

</div>
</div>


<div class="col-sm-4">

</div>
</div>
</div>
</div>

</body>
</html>
















