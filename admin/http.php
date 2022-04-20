<?php
$u=2;
include ("../lib/up.php");
?>
<center>
<p class=menu>
  
  <a href='http.php'>Contect Type</a> | 
  <a href='http.php?q=1'>Cachecontrol</a> | 
  <a href='http.php?q=2'>Contect Type %</a> | 
  
</p>
</center>

  
<div class="container">
	<div class=col-md-12>
<?php
	
		$comma=0;
		if(@$_GET["q"]==""){
		
			$sql="select contenttype as d, avg(duration) as c
			from data  
			group by contenttype";
			
			$q=mysqli_query($conn,$sql);
			
			$dta="[ ['ContentType', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma>0) $dta=$dta.",";
				$dta=$dta."['$r[d]',$r[c] ]";			
				$comma=1;
			}

			$dta=$dta."]";
			
		}
		
if(@$_GET["q"]=="1"){
		$sql="select count(*) as c
			from data  ";
		$q=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array($q);
		
		$total=$r['c'];
		
			$sql="select cachecontrol as d , 100*count(*)/$total as c	from data  
			group by cachecontrol";
			
			
			$q=mysqli_query($conn,$sql);
			
			$dta="[ ['Method', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma>0) $dta=$dta.",";
				$dta=$dta."['$r[d]',$r[c] ]";			
				$comma=1;
			}

			$dta=$dta."]";
			
		}

		
		
		
		
		
		if(@$_GET["q"]=="2"){
		$sql="select count(*) as c
			from data  ";
		$q=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array($q);
		
		$total=$r['c'];
		
			$sql="select cachecontrol as d , 100*count(*)/$total as c
			from data  
			group by cachecontrol";
			
			$q=mysqli_query($conn,$sql);
			
			$dta="[ ['Method', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma>0) $dta=$dta.",";
				$dta=$dta."['$r[d]',$r[c] ]";			
				$comma=1;
			}

			$dta=$dta."]";
			
		}

	?>
	
	
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          
          <?php
		  echo $dta;
		  ?>
        );

        var options = {
          chart: {
            title: 'Graph',
            subtitle: 'Mean',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
 	
</div>

</body>
</html>
