<?php
require_once '../classes/dbConfig.php';
require_once '../classes/User.cls.php';
session_start();

?>

<!DOCTYPE html>     
<!-- Felipe, Triana
     Description: Project
	 Date: Feb 2022        -->
<html lang="en"> 
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
   <title>UserProfile</title>
 
   <style>
   header{
	background-color: black;  background-repeat: no-repeat; height:100%; background-size: cover; background-image: linear-gradient(black,black,#003d4d, white)}
   h1 { text-shadow: 1px 1px 2px white, 0 0 20px white, 0 0 5px darkblue; text-align:center ; color:white}
      h2 { text-shadow: 1px 1px 2px white, 0 0 20px white, 0 0 5px darkblue; text-align:center ; color:white}
    .php::first-letter{ font-size: 150%;   color: red; }
   label {color:white}
   .logo {box-shadow: 1px 1px 2px black, 0 0 20px blue, 0 0 5px darkblue}
 .box{	
	float:left;	width:33.3%;padding:10px;text-align:center;box-sizing:border-box;}

.box img{
	height:110px;}
	
	.box6{	
	float:left;	width:16.0%;text-align:center;box-sizing:border-box;}

	.box6 img{
	height:140px;}



.container{ 
	width:100%;margin:auto;overflow:hidden;}
.options{float:left}
#nav ul{
	float:right;
	padding:1px 0;
	list-style:none;
}

#nav ul li{
	display:inline; 
}

#nav ul li a{
	
	text-decoration:none;
	font-size:25px;
	
	padding-right:30px;padding-left:25px;
	text-shadow: 1px 1px 2px black, 0px 0 20px black, 0 0 5px darkblue; text-align:center ; 
	
}
		a:link { color: white}
		a:visited {color: white;background-color: transparent; text-decoration: none;}
		a:hover {color: darkblue; background-color: transparent; text-decoration: underline;}
        a:active {color: blue; background-color: transparent; text-decoration: underline;}
#boxes{	
	margin-top:20px;}

.box{	
	float:left;	width:50%;padding:5px;text-align:center;box-sizing:border-box;}

.box img{
	height:110px;}		
.date{font-size:18px}

.buttonsearch{ 
    font-size: 16px; background-color: #009999; display:block;
   text-align: center; padding: 11px 25px;
   color: white; border-radius: 24px;
   float:right;	text-align:center;
   margin-right: 28px;
   margin-left:12%;
   margin-bottom:50px;
   }
   
   
.buttonsearch:hover {
  background-color: white;
  color: #009999; border-radius: 24px; transition: 0,25s;
  float:right;	text-align:center;box-sizing:border-box;}
  padding:50px;
  
}

.innerbox{
        font-size: 17px;
		background:none; display:block; margin: 20px auto; 
		text-align:center; border: 2px solid #009999; padding: 14px 10px; width:200px; 
		outline:none; color:white; border-radius: 24px; transition: 0,50s;}
.innerbox:focus{ width: 280px; border-color: white;}
.innerbox:hover{width: 280px; border-color: white;transition: 0,50s;}


.footlinks { 
	color:white; text-shadow: 1px 1px 2px black, 0 0 20px blue, 0 0 5px darkblue;font-family:serif}
#aside{
	float:left;
	width: 95%;
	padding:10px;
	
	box-sizing:border-box;
	margin:50px;
	margin-left:3%;
	
	
	color:white;
	margin-top:20px;
}

#footer{	
	background-color:black; color:white; border-bottom:1px solid #00001acolor:#009999; background-image: linear-gradient(black, black, #003d4d ,black, black,black);
	text-align:center;padding:20px;}



.halfleft{
	float:left;
	width: 40%;
	padding:5px;
	box-sizing:border-box;
	margin-left:150px;
	
	background-image: linear-gradient(white,   #ccffff , white); opacity:0.8;
	color:black;
	margin-top:1px;
}
#halfright{
	float:left;
	width: 30%;
	padding:5px;
	box-sizing:border-box;
	
	
	color:white;
	margin-top:1px;
	margin-right:100px;
}


   </style>
   
 </head>
 <body style="background-image: url(../img/a.jpg);  background-repeat: no-repeat; background-size: cover">
			<br>
			<header>
			
			<div class="container" id="top" style="opacity:0.9">
				<img src="../img/logoev.png" alt="logo" style="height:140px; float:left; opacity:0.9">
				<br><br>
				<h1> Best price, Best plan...   BEST EXPERIENCE</h1>
				
				
			</div>
			
			</header>
			
			
			<br>
			<label id="demo" class="date"></label><br>
			<label id="demo1" class="date"></label>
			
			   
			<br><br>
			<div id="nav">
				<ul>
						
						<li><a href="./Home.php" target="Content_Frame">Home </a></li>
						<li><a href="./Destinations.php" target="Content_Frame">Destinations </a></li>
						<li><a href="./Activities.php" target="Content_Frame">Activities </a></li>
						<li><a href="./Form.php" target="Content_Frame">Make Your Plan</a></li>
						<li><a href="./AboutUs.php" target="Content_Frame">About Us </a></li>						
						<li><a href="./LogOn.php" target="Content_Frame">Sign Out</a></li>
						
				</ul>
			</div>
			
			   
			<br>
			<div id="aside" style="margin:auto;text-align:left;font-size:20px;">
				<h1 style="text-align:center; color:white">Chosen Activities</h1>
				
				
				
				
				<br>
				
				<?php 
			     require_once '../classes/dbConfig.php';
			     require_once '../classes/City.cls.php';
			     require_once '../classes/Activity.cls.php';
			     require_once '../classes/Trip.cls.php';
			     
			     //Retrieving a list of Activities based on one City
			     $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			     $tripId=$_GET["tripId"];
			     $trip=new Trip();
			     $trip->setTripId($tripId);
			     $listOfActivities=unserialize($trip->getActivitiesByTripId($connection));
			     
			     $cpt=0;
			     $retrievedActivity=new Activity();
			     
			     foreach($listOfActivities as $oneActivity){
			         $activity=new Activity();
			         $activity->setActivityId($oneActivity->getActivityId());
			         $retrievedActivity=unserialize($activity->getActivitiesByActivityId($connection));
			         
			         echo "<div style='padding-top:10%;padding-bottom:20%;'>";
			         echo "<div class='halfleft'>
    					   <h2 style='color:#009999;'>".$retrievedActivity->getActivityName()."</h2>";
    				 echo "<h3 style='color:#009999;display:inline;'>Duration: </h3>".$retrievedActivity->getDuration();
    				 echo "<br/><br/><h3 style='color:#009999;display:inline;'>Price: </h3>".$retrievedActivity->getPrice().
		                    "<br/><br/><br/></div>
            				<div id='halfright'>
            					<img src='".$retrievedActivity->getImage()."' style='max-width:180%;;height:230px' alt='Wallpaper'/>
            				</div></div>";
			         
			         
			         
			         
			     }
			
			    
			?>
			
				<br/>
				
				</div>

			
				<a href="UserProfile.php"><input class="buttonsearch"type="button" name="View my Plans" value="Go Back" onclick=""></a>
			
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			<div class="container">
				<div class="box6">
					<img src="../img/niagara1.gif" alt="niagara">
				</div>
				<div class="box6">
				<img src="../img/dogs.gif" alt="dogs">
					
				</div>
				<div class="box6">
					<img src="../img/banff.gif" alt="banff">
				</div>
				<div class="box6">
					
					<img src="../img/churchill.gif" alt="churchill">
				</div>
				<div class="box6">
					<img src="../img/montreal1.gif" alt="montreal">
				</div>
				<div class="box6">
					<img src="../img/toronto1.gif" alt="toronto">
				</div>
  
  
  
			</div>
			<!-- services -->
		<section id="boxes">
			<div>
				<div class="box">
					
					<h2 class="footlinks" >2000, Sainte-Catherine Street West</br>Montréal, Québec H3H 2T1</h2>
					
				</div>
				<div class="box">
					
					<h2 class="footlinks" >Call us:</br>+1(514) 939-2006</h2>
					
				</div>
				
			</div>
		</section>
		<div id="footer">
			<p>Copyright &copy; 2022- Designed by EasyVac Inc.</p>
		</div>
	  <script>
		const d = new Date();
		document.getElementById("demo").innerHTML = d.toDateString();
		document.getElementById("demo1").innerHTML = d.toLocaleTimeString();
	  </script>
			
 
		
 </body>
</html>