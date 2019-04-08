<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <title>PHP todo App v2</title>
   <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  position: relative;
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right {
  float: right;
}

/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }
  
  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center
}
</style>
</head>
	<body>

		<!-- Top navigation -->
		<div class="topnav">

  		<!-- Centered link -->
  			<div class="topnav-centered">
    			<a href="#home" class="active">Home</a>
  			</div>
  
  		<!-- Left-aligned links (default) -->
  				<a href="#news">News</a>
  				<a href="#contact">Contact</a>
  
  		<!-- Right-aligned links -->
  			<div class="topnav-right">
    			<a href="#search">Search</a>
    			<a href="#about">About</a>
  			</div>
  
		</div>

<div style="padding-left:16px">
  <h2>Welcome to the PHP todo app version 2</h2>
  <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
</div>

		<h3 style="width:800px; margin:0 auto;">Please add an item to do</h3>

<!-- form that takes in user input to be displayed 
	 the form doesnt take information from another web page. it takes from the current one.
	 Self serving server using the POST method
	 It has two natural inputs, the first is the user input and the second is the user submit
-->		<div style="width:800px; margin:0 auto;">
			<form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" >
				<input type = "text" name = "enter">
				<input type = "submit">
			</form>
		</div>	


<?php

// the php funtion is listed below
// this funtion is used for storing whatever variable the user inputs
// these variables are stored in a session using the superglobals

   if(isset($_POST["enter"])){
       if(!(isset($_SESSION["items"]))){
       $_SESSION["items"] = array();
       $_SESSION["items"][] = $_POST["enter"];

       echoL();
   }else{
       $_SESSION["items"][] = $_POST["enter"];
       echoL();

   }
};

function echoL(){
   echo "<ul>";
       foreach($_SESSION["items"] as $item){
           echo "<li>".$item."</li>";
       };
       echo "</ul>";

};

	

?>

<!-- this section of code is used for creating strike throughs whenever the listed items are clicked on with the mouse
the function is created in jquery and uses the built in function of "text-decoration" and "line-through"	
 -->
<script>

$(document).ready(function(){
   var cross = 0;
   $("li").each(function(c){
       $(this).click(function(){
       checked = c;
        if(cross == 0){
           $(this).css("text-decoration", "line-through");
           cross = 1;
           sessionStorage.setItem(checked, done);

          }else{
              $(this).css("text-decoration", "none");
              cross = 0;
              sessionStorage.setItem(checked, done);
           }
       });
   });
$("li").each(function(c){
   if(sessionStorage.getItem(c)==1){
       $(this).css("text-decoration", "line-through");
   }
});
});



</script>

 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>