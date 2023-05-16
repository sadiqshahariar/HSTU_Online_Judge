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

if(isset($_GET['user']))
{
  $data=$_GET['user'];
  $us=$_GET['user'];

  //$query="UPDATE world SET value='$data'";
  //$run=mysqli_query($con,$query);

}

$admin=0;

$mysql="SELECT  status from user WHERE name='$username'";
$snd=mysqli_query($conn,$mysql);
$arrow=mysqli_fetch_array($snd);

$st=$arrow['status'];

if($st=="Teacher" || $st=="Problem Setter" || $st=="Developer")
{
   $admin=1;
}


?>


<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>About</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/about.css">
        <link rel="icon" type="image/png" href="img/hstu.png">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"> </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/chart.min.js"></script>
       
        

        

        
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


<div class="row ">
 <br><br><br>
<div class="row cspace">
<div class="col-sm-">
</div>
<div class="col-sm-6 pbs abc">
    <p class="ab">HSTU Online Judge,<br>It's our Emotion.We Wanted to have own Online Judge in our Campus.We want to develop programming skill using our Online Judge of our University.</p>
    
    <h2 class="hd">
      Main Developer
    </h2>
    <ul class="dev">
      <li><h4>MD Shahariar Sadiq</h4></li>
      <li><h4>Md Julfikar Ali</h4></li>
      <li><h4>Md Alamgir Hossain</h4></li>
    </ul>
    <h2 class="hd">
      Supervisor
    </h2>
    <div class="maam">
       <h4>Adiba Mahjabin Nitu</h4>
       <h5>Professor</h5>
       <h5>Department of Computer Science and Engineering (CSE)</h5>
       <h5>Hajee Mohammad Danesh Science & Technology University, Dinajpur.</h5>
    </div>

    <h2 class="hd">
      Contact
    </h2>
    <div class="maam">
       <h4>Email: sadiqshahariar@gmail.com</h4>
       <h4>Mobile: 01760594126</h4>
    </div>
  </div>
</div>


</body>
</html>
