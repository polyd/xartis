<?php
$u=1;
include "../lib/up.php";
?>


  
<div class="container ">

<?php

$sql="select * from users where id=$_SESSION[id]";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_array($q);
?>

	<div class="row">
	
	<div class='col-md-6'>
  <h2>My Profile</h2>
 
  <form action='' method=post>
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control" name=usr value="<?php echo $r['username']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name=pwd 
	  pattern="^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*[0-9])(?=.*?\W).*$">
    </div>
	
	 <div class="form-group">
      <label for="email">email:</label>
      <input type="email" class="form-control" name=email value="<?php echo $r['email']; ?>">
    </div>
	
	<input type='submit' value='Save' name="saveusr" class='btn btn-default'>
  </form>
 
  </div>
 
</div>
	
	
	<?php
	$sql="select count(*) as c from data where id_user=$_SESSION[id]";	
	$q=mysqli_query($conn,$sql);
	
		$r=mysqli_fetch_array($q);
		
		echo "Records: $r[c]<br>";
		if($r['c']>0){	
			$f="../uploads/$_SESSION[id]_file";
			echo "Last Upload:".date("F d Y H:i:s.", filemtime($f));
		}
	?>
</div>

</body>
</html>
