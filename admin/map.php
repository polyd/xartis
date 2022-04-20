<?php
$u=2;
include ("../lib/up.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container text-center" >

	<div id=map></div>

<script>

	    var map, heatmap;

      function initMap() {
		  
		  
         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 1,
		  
          center: {lat:  38.25, lng: 21.73},
		  mapTypeId: 'satellite'
        });
		
 
		 <?php
		$sql="select * from data";
		$q=mysqli_query($conn,$sql);
		
		
		
		 while($r=mysqli_fetch_array($q))
		 {
			 $s=$r['contenttype'];
		 if($r['location']!="" && 
			(	strpos($s,"html")!=false || 
				strpos($s,"php")!=false || 
				strpos($s,"asp")!=false ||
				strpos($s,"jsp")!=false
			)
			)
			{
					echo "
					var loc=new google.maps.LatLng($r[location]);
					
					new google.maps.Marker({
						position: loc,
						map
					});
					
					";
					
			}
		
		 }	
			
		 ?>


	  }
	
	  
</script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQU3fc3tpcd7-Su_QFPX9DEgyKC_Zu4os&libraries=visualization&callback=initMap">
	
    </script>
	
</div>

</body>
</html>
