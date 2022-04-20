<?php
$u=1;
include ("../lib/up.php");

?>
  
<div class="container">

	<div class="row">
	<div class='col-md-3'></div>
	<div class='col-md-6'>
  <h2>Admin Login</h2>
 
  <form action='adminpage.php' method=post>
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control" id="usr" name=usr>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name=pwd>
    </div>
	
	<input type='submit' value='Login' name="adminlog" class='btn btn-default'>
  </form>
  <br><br>
  
  </div>
  <div class=col-md-3></div>
</div>
	
</div>

</body>
</html>
