<?php
$u=2;
include ("../lib/up.php");
?>
  
<div class="container">
	<div class=col-md-12>
<?php
		
		$sql="select count(*) as c from users";
		$q=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array($q);
		echo "<p>Number of users: $r[c]</p>";
		
		
		$sql="select req , count(*) as c from data	group by req";
		
		$q=mysqli_query($conn,$sql);
		echo "
		
		<h2>Requests</h2>
		<div class='table-responsive'>
		<table class='table'>
		<tr><th>Type</th><th>Records</th></tr>
		";
		while($r=mysqli_fetch_array($q))
		{
			echo"<tr><td>$r[req]</td><td>$r[c]</td></tr>";			
			
		}

		echo "</table></div>";
		
		
		$sql="select status , count(*) as c	from data 	group by status";
		
		$q=mysqli_query($conn,$sql);
		echo "<h2> Status</h2>
		<div class='table-responsive'>
		<table class='table'>
		<tr><th> Type</th><th>Records</th></tr>
		";
		while($r=mysqli_fetch_array($q))
		{
			echo"<tr><td>$r[status]</td><td>$r[c]</td></tr>";				
		}

		echo "</table></div>";
		
		
		
		$sql="select domain , count(*) as c	from data group by domain";
		
		$q=mysqli_query($conn,$sql);
		echo "
		
		<h2> Domain</h2>
		<div class='table-responsive'>
		<table class='table'>
		<tr><th>Domain</th><th>Records</th></tr>
		";
		while($r=mysqli_fetch_array($q))
		{
			
			echo"<tr><td>$r[domain]</td><td>$r[c]</td></tr>";			
			
		}

		echo "</table></div>";
		
		
		
		
		$sql="select isp , count(*) as c
		from data  
		group by isp";
		
		$q=mysqli_query($conn,$sql);
		echo "
		
		<h2> isp</h2>
		<div class='table-responsive'>
		<table class='table'>
		<tr><th>ISP</th><th>Records</th></tr>
		";
		while($r=mysqli_fetch_array($q))
		{
			
			echo"
				<tr><td>$r[isp]</td><td>$r[c]</td></tr>

			";			
			
		}

		echo "</table></div>";
		
		
		$sql="select avg(duration) as c from data";

		$q=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array($q);
		echo "<h1>Mean Time: $r[c]</h1>";
		

	?>
	
	
</div>

</body>
</html>
