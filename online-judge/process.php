<?php
error_reporting(0);
session_start();
include('config.php');

 
$uname=$_POST['un'];
$pw=$_POST['ps'];
$url=$_POST['uri'];
$pw=md5($pw);


$lq="SELECT * FROM `user` WHERE name='$uname' AND pass='$pw'";

$sq=mysqli_query($conn,$lq);

$count = mysqli_num_rows($sq);

if($count>0){
while($row=mysqli_fetch_assoc($sq))
{
	echo $row['name'];
	echo "<br>";
	echo $row['pass'];
	echo "<br>";
	if($uname==$row['name'] && $row['pass']==$pw)
	{
       
       
           $_SESSION=array();

           $_SESSION['un']=$row['name'];
           $_SESSION['ps']=$row['pass'];          
           header('location:'.SITEURL.'home.php');

	}
	else
	{
		 header("Location:login.php?value=fail");
		 //echo "<script>window.alert(\"Wrong Username And Password\");</script>";
         //echo("Wrong Username And Password");
         echo '<script language="javascript">';
		 echo 'alert("Wrong Username And Password")';
		  echo '</script>';
	}


}
}
else
{
	 header("Location:login.php?value=fail");
	 //echo "<script>window.alert(\"Wrong Username And Password\");</script>";
	// echo("Wrong Username And Password");
	  echo '<script language="javascript">';
		 echo 'alert("Wrong Username And Password")';
		  echo '</script>';
}

?>