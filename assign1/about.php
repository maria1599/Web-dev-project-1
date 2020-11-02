<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Index/Home Page</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Assignment 1" />
		<meta name="keywords" content="PHP" />
		<meta name="author" content="Maria Serrano"/>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<header> <!--Header showing html web title!-->
			<h1>Job Vacancy Posting System</h1>
		</header>
		<nav> <!-- Navigation bar that include links to home, postjobform, searchjobform and about page !-->
			<a href="index.php">Home</a>
			<a href="jobpostform.php">Post a Job Vacancy</a>
			<a href="searchjobform.php">Search for a Job Vacancy</a>
			<a href="about.php" class="current">About</a>
		</nav>
		
		<main>
			<h2>About Page</h2>
			<div>
				<p>This page presents what I have done for this unit:	</p>

				<ul> <!--Unorder list!--> 
					<li>What is the PHP version installed in mercury?</li>
					<?php
					echo "The current PHP version is: ". phpversion(); //shows current version of php used
					?>
					<li>What tasks did not attempt or completed?</li>
						<p>I failed to complete task 8 as I wasn't able to implement sort date</p>
					<li>What special features have you done, or attempted in creating the site that we should know about?</li>
						<p>I added a link to show all job vacancy posts in search form page</p>
					<li>What discussion points did you participated on in the unit's discussion board for Assignment 1? If you did not participate, state your reason</li>
						<p>I provided a suggestion on how to resolve the location string and data in search results</p>
					<img class="image" src="image/sc.PNG" alt="image" style="width:700px;height:600px";> <!-- screen shot image of discussion board participation!-->
				</ul>

			</div>

		</main>
		<a href="index.php">Return to Home Page</a>
	</body>
</html>