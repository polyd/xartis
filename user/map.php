<?php
$u=1;
include "../lib/up.php";
?>


<div class="container text-center" >

	<div id=map></div>

<script>

	  var map, heatmap;
      function initMap() {
		  
         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 1,
		  
          center: {lat:  38.253, lng: 21.731},
		  mapTypeId: 'satellite'
        });
		
 
		 <?php
		
		
		$sql="select * from data where id_user='$_SESSION[id]'";
		 $q=mysqli_query($conn,$sql);
		
		$hmdata= "  var heatmapData = [";
		
		 while($r=mysqli_fetch_array($q))
		 {
			 $ct=$r['contenttype'];
		 if($r['location']!="" &&	(	strpos($ct,"html")!=false || 
										strpos($ct,"php")!=false || 
										strpos($ct,"asp")!=false ||
										strpos($ct,"jsp")!=false
									)
			) 
			$hmdata=$hmdata."new google.maps.LatLng($r[location]),";
		
				
		 }
		$hmdata=$hmdata."new google.maps.LatLng($r[location])];";		 

			echo $hmdata;
			
		 ?>


		 
		heatmap = new google.maps.visualization.HeatmapLayer({
		data: heatmapData,
		map: map
		});
		 
      
      }


function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }


	  
</script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=visualization&callback=initMap">
	
    </script>
	
</div>

</body>
</html>
