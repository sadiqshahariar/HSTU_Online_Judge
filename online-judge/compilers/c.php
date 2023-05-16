
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



<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Run Code</title>
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
      <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>
      <li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="#"><i class="fa fa-check-square ispace"></i>Debug</a></li>
      <li class="lgspace space"><a href="profile.php?user=<?php echo("$username"); ?>"><i class="fa fa-user ispace"></i><?php echo("$username"); ?></a></li>
      <li class="space"><a href="logout.php"><i class="fa fa-power-off ispace"></i>Logout</a></li>
      
    </ul>
    </div>
</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-2">
</div>

<div class="col-sm-7">
<div class=""><h3 style="text-align:center;">Code Compiler</h3></div>
</div>

<div class="col-sm-3">
  
</div>

</div>

<div class="row cspace">
<div class="col-sm-8">


<?php
 
	$lang=$_POST['language'];
	$source=$_POST['code'];
	$pb=$_POST['pbn'];
	$pid=$_POST['id'];
	$us=$_SESSION['un'];

	$isql="SELECT tc FROM archieve WHERE id='$pid'";
	$si=mysqli_query($conn,$isql);
	$r4=mysqli_fetch_array($si);
	$input = $r4['tc'];
	

$curl = curl_init();

$url = 'https://api.codex.jaagrav.in';

$data = http_build_query(array(
    'code' => $source,
    'language' => $lang,
    'input' => $input
));

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$responseObj = json_decode($response);
$output = $responseObj->output;

// Print the output
//echo $output;

require_once("connection.php");

$nsql="INSERT into code VALUES('$us','$source','')";
		$usql="UPDATE archieve SET uoutput='$output' WHERE id='$pid'";
		$csql="SELECT uoutput FROM archieve WHERE id='$pid'";
		$q3="SELECT id FROM code ORDER BY id DESC ";
		$snq=mysqli_query($conn,$nsql);
		$snd=mysqli_query($conn,$usql);
		$cnd=mysqli_query($conn,$csql);
		$sq3=mysqli_query($conn,$q3);
		$r2=mysqli_fetch_array($cnd);
		$r4=mysqli_fetch_array($sq3);


		$uo=$r2['uoutput'];
		$ac=$row['output'];
		$nid=$r4['id'];

echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-success\"><strong>Successfully Compiled!</strong> Click Below Submit Button To Submit.</div></div><div class=\"col-sm-2\"></div></div>";

echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><form action=\"allsubmission.php\" method=\"POST\"><input type=\"hidden\" name=\"pb\" value=\"$pb\"><input type=\"hidden\" name=\"id\" value=\"$pid\"><input type=\"hidden\" name=\"mid\" value=\"$nid\"><input type=\"hidden\" name=\"vd\" value=\"$fr\"><textarea style=\"display:none\" name=\"result\" rows=\"10\" cols=\"10\">$output</textarea><input class=\"btn btn-success tm\" type=\"submit\" value=\"Submit Code\"> </div><div class=\"col-sm-2\"></div></div>";

?>

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
