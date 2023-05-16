



<?php include("main/header.php");?>


<div class="row mu">
<div class="col-sm-1">
</div>
<div class="col-sm-9">
<center>
<div class="form-group log">
<div class="xmm">
<h2 style=""><u>Sign Up</u></h2>



<form action="action.php" name="f1" method="POST">

<label for="email">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter Email" required><br>
<label for="username">Username</label>
<input type="text" name="uname" class="form-control" placeholder="Enter Username" required><br>
<label for="password">Password</label>
<input type="password" class="form-control"  name="password" placeholder="Enter Password" required><br>

<button type="submit" class="btn btn-success">Sign Up</button><br><br>
	

</form>


<?php
if(isset($_GET['value']))
{
   
   echo "<div class=\"alert alert-danger\">
  <strong>Sign up Failed!</strong>  Username already exists!!
   </div><br>";
    
}
?>
</div>
</div>
</center>
</div>

<div class="col-sm-2">

</div>
</div>
</div>
<div class="sign">
<div class="container-fluid well foot">
<div class="row">



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

