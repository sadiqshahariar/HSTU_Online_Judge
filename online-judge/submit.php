<?php

session_start();
require_once("config.php");

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION['un']))
{
	header("Location:login.php");
}
if(isset($_SESSION['un']))
{
	$username=$_SESSION['un'];
}
?>



<?php

$c=0;

if(isset($_GET['id']))
{
   $problemid=$_GET['id'];
   $c=1;
}

$sql="SELECT * FROM archieve WHERE id='$problemid' ";

$sq=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($sq);




//echo "<textarea  style=\"display:none;\" name=\"in\" 

?>

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Submit</title>
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
<div class=""><h3 style="text-align:center;">Submit Code</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="pcompile.php" name="f2" method="POST">
<label for="lang">Choose Language</label>

<select class="form-control" name="language">
<option value="c">C</option>
<option value="cpp">C++</option>
<option value="cpp11">C++11</option>
<option value="java">Java</option>


</select><br><br>

<?php

    if($c==1)
    {
       //echo "<input type=\"hidden\" name=\"pbn\" value=\"$problem\">";
    	echo "<input type=\"hidden\" name=\"id\" value=\"$problemid\">";
    }
    else
    {
    	echo"<label for=\"pp\">Enter Problem ID</label><br>";
    	//echo "<input class=\"form-control\" type=\"text\" name=\"pbn\">";
    	echo "<input class=\"form-control\" type=\"text\" name=\"id\">";
    }

 ?>

<label for="ta">Write Your Code</label>
<textarea class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
<input type="hidden" name='pbn' value="<?php echo $row['pbname']; ?>">
<input type="submit" class="btn btn-success" value="Run Code"><br><br><br>


</form>


</div>

<div class="col-sm-4">

</div>
</div>
</div>
</div><br><br><br>

<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
</div>

<div class="col-sm-5">


<div class="">

<b>Beta Version-2023</b><br>
<b>Developed By Wrong Submission</b>

</div>
</div>


<div class="col-sm-4">
<?php

require_once("time.php");

?>
</div>
</div>
</div>
</div>






</body>

</html>
