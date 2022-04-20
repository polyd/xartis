<?php
session_start();
$conn=mysqli_connect("localhost","root","","zondoudb");
$msg="";
$menu="";
if($u==1)
{
	$menu="
	<p class='menu'>
	<a href='upload.php' >Upload Data</a> | 
	<a href='map.php' >Map</a> |
	<a href='profile.php' >Profile</a> | 
	<a href='logout.php' >Logout</a>
	</p>
	";
	
}

if($u==2)
{
	$menu="
	<p class='menu'>
	<a href='basics.php' >Basic Stats</a> | <a href='time.php' >Times</a> |
	<a href='map.php' >Map</a> | <a href='http.php' >Https Stats</a> |<a href='logout.php' >Logout</a>
	</p>
	";
	
}

if(isset($_POST['signup']))
{
	
	
		$sql="INSERT INTO users ( username, email, password,   typos) 
		VALUES ( '$_POST[usr]','$_POST[email]', '".md5($_POST['pwd'])."','user')";
				
			
			if(mysqli_query($conn,$sql))
			{
				$msg= "<h1>Your data saved</h1> ";
				
			}
			else
			{
				
				$msg="<h1>Your data not saved ! please try other username</h1>";
				
		}

}





if(isset($_POST['usrlg']))
{
	

	
	$q=mysqli_query($conn,"select  * from users where username='$_POST[usr]'
				and password='".md5($_POST['pwd'])."'"); 


	
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_array($q);
		$_SESSION['id']=$r['id'];
	}
	else
	{
		$_SESSION['id']="";
		$msg="<h1>User Not found !!! <a href='index.php'>Back</a></a>";
	}
}




if(isset($_POST['adminlog']))
{
	

	
	$q=mysqli_query($conn,"select  * from users where typos='admin' and username='$_POST[usr]'
				and password='".md5($_POST['pwd'])."'"); 


	
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_array($q);
		$_SESSION['id']=$r['id'];
	}
	else
	{
		$_SESSION['id']="";
		$msg="<h1>User Not found !!! <a href='index.php'>Back</a></a>";
	}
}





if(isset($_POST['upl']))
	{
		$f="../uploads/$_SESSION[id]_file";
	
		if(move_uploaded_file($_FILES['file1']['tmp_name'],$f))
		{

		
		$ct=""; 
		$cc="";
		$host="";
		
		$status="";
		$date_ins="";
		$duration="";
		$location="";
		$isp="";
		
		$js=json_decode(file_get_contents($f, true));
		foreach ($js->log->entries as $jrec)
		{
			
			foreach ($jrec->response->headers as $j2)
			{
				if($j2->name=="Content-Type")	$ct=$j2->value;
				if($j2->name=="Cache-Control")	$cc=$j2->value;
			}
			
			
			foreach ($jrec->request->headers as $j2)
			{
				if($j2->name=="Host")	$host=$j2->value;			
			}
			
			$srv=$jrec->serverIPAddress;
			$api = json_decode(@file_get_contents("http://ipinfo.io/$srv/json"));
			$location=@$api->loc;
			$isp=@$api->org;
			$method=$jrec->request->method;
			$status=$jrec->response->status;
			$date_ins=$jrec->startedDateTime;
			$duration=$jrec->time;
			
			
			
			$sql="
			INSERT INTO data (id,contenttype,cachecontrol,req,status,domain,
				isp ,date_ins ,duration ,location ,id_user) VALUES 
			(NULL, '$ct','$cc','$method','$status','$host','$isp','$date_ins','$duration','$location',$_SESSION[id]);
				";		
				
				
				
			mysqli_query($conn,$sql);
	
			
		}
		$msg= "<h2>File uploaded !</h2>";
		
		
		
		
	}
}



if(isset($_POST['saveusr']))
{
	
	
	if($_POST['pwd']!="")
	{
			
		$sql="update users set username='$_POST[usr]', email='$_POST[email]', 
		password='".md5($_POST['pwd'])."' 
		where id=$_SESSION[idu];";
	}
	else
	{
		
		
		$sql="update users set username='$_POST[usr]', 
		email='$_POST[email]' 
		where id=$_SESSION[idu];";
	}		
			
	if(mysqli_query($conn,$sql))
			{
				$msg= "Your data saved.";
			}
			else
			{
				
				$msg="Error Data not saved! Try again";	
			}


}


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
<style>
.menu {
	font-size:18pt;
	margin-top:20px;
	padding:5px;
	border:1px solid;
	
}


#map {
	width:100%;
	height:600px;
	
}

</style>

</head>
<body>
<center>
<?php

echo $msg;
if(@$_SESSION['id']!="")
	{
echo $menu;
	}
?>
</center>