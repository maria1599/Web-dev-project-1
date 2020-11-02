<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Post Job Process</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Assignment 1" />
		<meta name="keywords" content="PHP" />
		<meta name="author" content="Maria Serrano"/>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<header>
			<h1>Job Vacancy Posting System</h1>
		</header>
		<nav> <!-- Navigation bar that include links to home, postjobform, searchjobform and about page !-->
			<a href="index.php">Home</a>
			<a href="jobpostform.php" >Post a Job Vacancy</a>
			<a href="searchjobform.php" class="current">Search for a Job Vacancy</a>
			<a href="about.php">About</a>
		</nav>
		<main>

			<?php
				$filename = "../../data/jobposts/jobs.txt"; //Gets file path.
				$dir = "../../data/jobposts"; //Gets directory path.
				umask(0007);


				if (file_exists($filename)) {

					
					$handle = fopen($filename, "r");

					echo "<h3>Job Vacancy Information</h3>";
					echo "<hr>";


					$found = false;


					while (!feof($handle)) {
						$onedata = fgets($handle);

						
						if ($onedata !="") {

							$data = explode("\t",  $onedata);						

							echo "<strong>Job Title: </strong>". $data[1] ."</br>";
					        echo "<strong>Description: </strong>". $data[2] ."</br>";
					        echo "<strong>Closing Date: </strong>". $data[3] ."</br>";
					        echo "<strong>Position: </strong>". $data[4] . " - ".$data[5]. "</br>";
					        echo "<strong>Application by: </strong>". $data[6] . "-- ".$data[7]."</br>";
					        echo "<strong>Location: </strong>". $data[8] ."</br>";
					        echo "<hr>";

							$found = true;

  
						} 


					} fclose($handle);



					if($found == false){  //if the string search is not found an error message + link to  home page & search job vacancy
						echo "<p>Oh no! Search failed! criteria not found Please try again</p>";
						echo "<p>Return <a href=\"index.php\"> Home Page</a> or go back to: <a href=\"searchjobform.php\">Search Job Vacancy</a></p>";
					} else {
						echo "<p>Return <a href=\"index.php\"> Home Page</a> or go back to: <a href=\"searchjobform.php\">Search for a specific Job Vacancy</a></p>";
					}
				}

					 
 			?>


		<a href="index.php">Return to Home Page</a>
	</body>
</html>