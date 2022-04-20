<?php
$u=1;
include "../lib/up.php";
?>


  
<div class="container text-center" >
	
<?php


	if(@$_SESSION['id']!="")
	{




?>


<form action='' method='post' enctype='multipart/form-data'>
  <div class=row>
  <div class='col-md-6 text-left'>
   <label >Give you File:</label>
    <input type='file' class='form-control'  name='file1' >

	<input type='submit' class='btn btn-default' value='Upload' name='upl'> 
  </div>
  </div>
	<?php
	}

	?>
	
	
	
</div>

</body>
</html>
