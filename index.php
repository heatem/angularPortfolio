<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional// EN" "http://www.w3.org/TR/xhtml/DTD/xhtml-transitional.dtd">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.17/angular.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="stylesheet.css" href="http://fonts.googleapis.com/css?family=PT+Sans:700" />
 <meta charset="utf-8">
 <title>Heather's Porfolio</title>
 <meta name="description" content="Heather's first portfolio site with work and contact information.">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js">
  </script>
</head>
<body ng-app="workApp">
	<div class="navBar">
		<h2 class="brand">Heather Mason</h2>
		<ul class="nav">
			<li class="navItem"><a href="#home">Home</a></li>
			<li class="navItem"><a href="#work">Work</a></li>
			<li class="navItem"><a href="#contact">Contact</a></li>
		</ul>
	</div>

	<a name="home"></a>
	<div class="home">
		<div class="homeBlock">
			<h1 class="me">Heather Mason</h1>
			<p class="me">heatem @ gmail . com</p>
			<div class="quickLinks">
				<a href="http://www.linkedin.com/in/HeatherEM" target="_blank" class="quickLinks">LinkedIn</a>
				<a href="https://github.com/heatem" target="_blank" class="quickLinks">GitHub</a>
				<a href="https://instagram.com/heatem/" target="_blank" class="quickLinks">Instagram</a>
			</div>
		</div>
	</div>

	<a name="work"></a>
	<div class="workDiv" ng-controller="MainController">
		<div class="work" ng-repeat="work in works">
			<img ng-src="{{ work.sampleImg }}" />
	
			<div class="workText">
				<p><strong>{{ work.name }}</strong></p>
				<p>{{ work.description }}</p>
			</div>
		</div>
	</div>

	<a name="contact"></a>
	<div class="contactDiv" align="center">
		<div class="phpDiv">
			<?php
				$name = $_POST["firstname"]." ".$_POST["lastname"];
				$email = $_POST["email"];
				$subject = $_POST["subject"];
				$message = $_POST["message"];
				$from = "From: Portfolio";
				$to = "heatem@gmail.com";
				$human = strtoupper($_POST["human"]);
				$body = "From: $name\n E-Mail: $email\n Message:\n $message";
				
				if($_POST["submit"]) {
					if ($name != "" && $email != "") {
						if ($human == "NO") {
							if (mail($to, $subject, $body, $from)) { 
								echo "<p>Your message has been sent!</p>";
							} 
							else {
								echo "<p>Oops. Something went wrong. Please check all fields and try again.</p>";
							}
						} else if ($human != "NO") {
							echo "<p>You answered the anti-spam prompt incorrectly</p>";
						}
					} 
				}
			?>
		</div>
		<form class="contact" method="post" action="index.php">
			<input name="firstname" placeholder="First Name" size="24">
			<input name="lastname" placeholder="Last Name" size="24"><br /> 
			<input type="email" name="email" placeholder="Your Email Address" size="52"><br />
			<input name="subject" placeholder="Enter subject here" size="52"><br />
			<textarea type="comment" name="message" size="42" rows="10" cols="50" placeholder="Enter your message here."></textarea><br />
			<input name="human" placeholder="Are you spamming me? Yes or no." size="52"><br />
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
	
	
	<div class="footer">
		<ul class="footerNav" align="center">
			<li><a href="#home">Home</a></li>
			<li><a href="#work">Work</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</div>

	<script>
		angular.module("workApp", [])
		.controller("MainController", function($scope) {
			$scope.works = [
			{
				name: 'Web Interface Design Project',
				sampleImg: 'img/CIS282WebsiteScreen.jpg',
				description: 'This was my first website. I planned it in Photoshop and built it using HTML and CSS. The project consisted of three pages: About, Skills, and Contact.'
			},
			{
				name: 'Arts & Sciences Capstone Wix Project',
				sampleImg: 'img/CAP480WixScreen.jpg',
				description: 'This was a portfolio/resume site built using a Wix template.'
			},
			{
				name: 'Arts & Sciences Capstone Presentation',
				sampleImg: 'img/CAP480PptScreen.jpg',
				description: 'This was a PowerPoint created to present my opinion about the need for simplifying the online learning platform at my school.'

			}
			]
		});
	</script>


</body>