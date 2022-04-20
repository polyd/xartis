<?php
$u=0;
include ("../lib/up.php");

?>

<h1 class='text-center'>Connect as User </h1>
  
<div class="container" >

	<div class="row">
	
	<div class='col-md-6'>
  <h2>Login</h2>
 
  <form action='userpage.php' method=post>
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control"  name=usr>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  name=pwd>
    </div>
	
	<input type='submit' value='Login' name='usrlg' class='btn btn-default'>
  </form>
  <br><br>
 
  </div>
  
  <div class='col-md-6'>
  
  <h2>Registration</h2>
 
  <form action='' method=post>
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control" name="usr">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" 
	  pattern="^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*[0-9])(?=.*?\W).*$">
    </div>
	
	 <div class="form-group">
      <label for="email">email:</label>
      <input type="email" class="form-control" id="email" name=email>
    </div>
	
	<input type='submit' value='Save' name='signup' class='btn btn-default'>
  </form>
  <br><br>
  </div>
  
  
  </div>
  
  
</div>
	
</div>

</body>
</html>
