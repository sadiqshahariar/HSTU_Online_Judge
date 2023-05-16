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

if(isset($_GET['user']))
{
  $data=$_GET['user'];
}

?>


<?php include("main/header.php");?>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;"><?php  echo" Update Admin Panel"; ?></h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>

<div class="row cspace">
<div class="col-sm-8">
<?php

if(isset($_POST['name']) || isset($_POST['email'])||isset($_POST['status']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $status=$_POST['status'];

   $sql="UPDATE user SET  status='$status' WHERE name='$name'";
   $send=mysqli_query($conn,$sql);


   if($send)
   {
       echo "<div style=\"margin-left:250px;\" class=\"alert alert-success\">
  <strong>Admin Panel Has Been Updated! Go To Your <a href=\"profile.php?user=$name\">Profile</a></strong>
   </div><br><br><br><br>";
   }
   else
   {
      echo "<div style=\"margin-left:250px;\" class=\"alert alert-danger\">
    <strong>Operation Failed. Please Try Again By Giving Correct Username And Email</strong>
   </div><br><br><br><br>";
   }
 

  


}





?>





  
   
  </div>


<div class="col-sm-4">

</div>
</div>
</div><br><br><br><br>

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
