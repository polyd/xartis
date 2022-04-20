<?php
$u=2;
include ("../lib/up.php");
?>
<center>
<p class=menu>
  
  <a href='time.php'>Contect Type</a> | 
  <a href='time.php?q=1'>Day of week</a> | 
  <a href='time.php?q=2'>Requests</a> | 
  <a href='time.php?q=3'>ISP</a>
  
</p>
</center>

  
<div class="container ">
	<div class=col-md-12>
<?php
		$comma=0;
		
		
		if(@$_GET["q"]=="0"){
		
			$sql="select contenttype as d, avg(duration) as c	from data  
			group by contenttype";
			
			$q=mysqli_query($conn,$sql);
			
			$dta="[ ['Content Type', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma!=0) $dta=$dta.",";
				$dta=$dta."['$r[d]',$r[c] ]";			
				$comma=1;
			}

			$dta=$dta."]";
			
		}
		
		if(@$_GET["q"]=="1"){
		
			$sql="select DAYOFWEEK(date_ins) as d , avg(duration) as c
			from data group by DAYOFWEEK(date_ins)";
			$q=mysqli_query($conn,$sql);
			$dta="[ ['Day', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma>0) $dta=$dta.",";
				$dta=$dta."['$r[d]',$r[c] ]";			
				$comma=1;
			}

			$dta=$dta."]";
			
		}
		
		
		if(@$_GET["q"]=="2"){
		
			$sql="select req as d, avg(duration) as c
			from data  
			group by req";
			
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
		
		
		if(@$_GET["q"]=="3"){
		
			$sql="select isp as d, avg(duration) as c
			from data  
			group by isp";
			
			$q=mysqli_query($conn,$sql);
			
			$dta="[ ['ISP', 'Mean Time'],";
			
			while($r=mysqli_fetch_array($q))
			{
				if($comma>0) $comma=$comma.",";
				$comma=$comma."['$r[d]',$r[c] ]";			
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
            title: 'Times',
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
